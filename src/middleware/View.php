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

namespace satframework\middleware;

use pte\CustomRender;
use satframework\Framework;
use satframework\peh\ThrowView;
use satframework\Response;

/**
 * Class View
 * @package satframework\middleware
 */
class View extends Controller implements CustomRender
{

    var $fn;
    var $param;

    var $tempJs = '';
    var $tempCss = '';

    /**
     * View constructor.
     */
    public function __construct()
    {
        $exception_handler = new ThrowView('View Error', new Response());
        $exception_handler->setLogger($this);

        set_exception_handler(array($exception_handler, 'ExceptionHandler'));
        set_error_handler(array($exception_handler, 'ErrorHandler'));
    }

    /**
     * @return array
     */
    public function BeforeInitialize()
    {
        return array();
    }

    /**
     * @return array
     */
    public function AfterInitialize()
    {
        return array();
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
        if ($this->fn === 'url') {
            return Framework::$factory->getBase() . $this->param;
        }
        if ($this->fn === 'const') {
            return $this->const[$this->param];
        }
        return '';
    }

}