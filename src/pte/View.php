<?php

namespace pukoframework\pte;

use pukoframework\auth\Auth;

class View extends Controller implements Auth
{
    public function __construct()
    {
//        $exceptionHandler = new ThrowView();
//        set_exception_handler(array($exceptionHandler, 'ExceptionHandler'));
//        set_error_handler(array($exceptionHandler, 'ErrorHandler'));
    }

    public function Login($username, $password)
    {
    }

    public function Logout()
    {
    }

    public function GetLoginData($id)
    {
    }

    /**
     * @return array|string|bool|null
     */
    public function OnInitialize()
    {
        return null;
    }
}