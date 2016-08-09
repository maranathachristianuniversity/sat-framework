<?php
namespace pukoframework\auth;

class Session
{
    private $method;
    private $key;
    private $identifier;
    private $authentication;

    public static $session;

    private function __construct(Auth $authentication)
    {
        if(is_object(self::$session)) return;
        $secure = ROOT . "/config/encryption.php";
        $secure = include $secure;
        $this->key = $secure['key'];
        $this->method = $secure['method'];
        $this->identifier = $secure['identifier'];
        $this->authentication = $authentication;
    }

    public static function Get(Auth $authentication)
    {
        if(is_object(self::$session)) return self::$session;
        return self::$session = new Session($authentication);
    }

    public static function GenerateSecureToken()
    {
        //todo: if(hash_equals($_POST['token'],$_COOKIE['token']))
        if (function_exists('mcrypt_create_iv')) $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        else $token = bin2hex(openssl_random_pseudo_bytes(32));
        setcookie('token', $token, time() + (86400 * 30), '/', $_SERVER['SERVER_NAME']);
        $_COOKIE['token'] = $token;
    }

    private function Encrypt($string)
    {
        $key = hash('sha256', $this->key);
        $iv = substr(hash('sha256', $this->identifier), 0, 16);
        $output = openssl_encrypt($string, $this->method, $key, 0, $iv);
        return base64_encode($output);
    }

    private function Decrypt($string)
    {
        $key = hash('sha256', $this->key);
        $iv = substr(hash('sha256', $this->identifier), 0, 16);
        return openssl_decrypt(base64_decode($string), $this->method, $key, 0, $iv);
    }

    public function PutSession($key, $val)
    {
        setcookie($key, $this->encrypt($val), time() + (86400 * 30), "/", $_SERVER['SERVER_NAME']);
    }

    public function GetSession($val){
        if (!isset($_COOKIE[$val])) return false;
        return $this->decrypt($_COOKIE[$val]);
    }

    public function RemoveSession($key)
    {
        setcookie($key, '', time() - (86400 * 30), '/', $_SERVER['SERVER_NAME']);
    }

    public function IsSession()
    {
        if (isset($_COOKIE['puko'])) return true;
        return false;
    }

    public function ClearSession()
    {
        setcookie('puko', '', time() - (86400 * 30), '/', $_SERVER['SERVER_NAME']);
    }

    #region authentication
    public function Login()
    {
        $secure = $this->authentication->Login();
        if($secure == false || $secure == null) return false;
        $secure = $this->encrypt($secure);
        setcookie('puko', $secure, time() + (86400), "/", $_SERVER['SERVER_NAME']);
        return true;
    }

    public function Logout()
    {
        $this->ClearSession();
        $secure = $this->authentication->Logout();
        if($secure == false || $secure == null) return false;
        return true;
    }

    public function GetLoginData()
    {
        if (!isset($_COOKIE['puko'])) return false;
        return $this->authentication->GetLoginData($this->decrypt($_COOKIE['puko']));
    }
    #end region authentication
}