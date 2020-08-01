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

use satframework\peh\ThrowConsole;

/**
 * Class Console
 * @package satframework\middleware
 */
class Console extends Controller
{

    /**
     * Console constructor.
     */
    public function __construct()
    {
        $exception_handler = new ThrowConsole('Console Error');
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
     * @return mixed
     */
    public function AfterInitialize()
    {
        return array();
    }
}