<?php
/**
 * satframework.
 * MVC PHP Framework for quick and fast PHP Application Development.
 * Copyright (c) 2020, IT Maranatha
 *
 * @author Didit Velliz
 * @link https://github.com/maranathachristianuniversity/sat-framework
 * @since Version 0.9.3
 */

namespace satframework\pdc;

use Exception;
use pte\CustomRender;
use pte\exception\PteException;
use pte\Pte;
use satframework\auth\Bearer;
use satframework\auth\Cookies;
use satframework\auth\Session;
use satframework\Framework;
use satframework\Response;

/**
 * Class Auth
 * @package satframework\pdc
 */
class Auth implements Pdc, CustomRender
{

    var $fn;
    var $param;

    var $key;
    var $switch;
    var $auth;

    /**
     * @param $clause
     * @param $command
     * @param $value
     */
    public function SetCommand($clause, $command, $value)
    {
        $this->key = $clause;
        $this->switch = $command;
        $this->auth = $value;
    }

    /**
     * @param Response &$response
     * @return mixed
     * @throws Exception
     * @throws PteException
     */
    public function SetStrategy(Response &$response)
    {
        $render = new Pte(false);
        if ($response->useMasterLayout) {
            $render->SetMaster($response->htmlMaster);
        }

        $hasPermission = false;
        if ($this->switch === 'cookies') {
            $hasPermission = Cookies::Is();
        }
        if ($this->switch === 'session') {
            $hasPermission = Session::Is();
        }
        if ($this->switch === 'bearer') {
            $hasPermission = Bearer::Is();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $hasPermission = true;
        }
        if (!$hasPermission) {
            $data = array(
                'status' => 'error',
                'exception' => array(
                    'Message' => 'Authentication Required'
                )
            );

            http_response_code(403);
            header('Cache-Control: must-revalidate');
            header('Cache-Control: no-cache');

            $render->SetValue($data);
            if ($response->useHtmlLayout) {
                $render->SetHtml(sprintf('%s/assets/system/auth.html', Framework::$factory->getRoot()));
                echo $render->Output($this, Pte::VIEW_HTML);
            } else {
                echo $render->Output($this, Pte::VIEW_JSON);
            }
            exit();
        }
        return true;
    }

    /**
     * @param $fnName
     * @param $paramArray
     */
    public function RegisterFunction($fnName, $paramArray)
    {
        $this->fn = $fnName;
        $this->param = $paramArray;
    }

    /**
     * @param null $data
     * @param string $template
     * @param bool $templateBinary
     * @return string
     */
    public function Parse($data = null, $template = '', $templateBinary = false)
    {
        if ($this->fn === 'auth') {
            return $this->param;
        }
        return '';
    }
}