<?php

namespace pukoframework\pte;

use pukoframework\peh\ThrowView;
use pukoframework\Response;

abstract class View extends Controller
{

    public function __construct()
    {
        $exception_handler = new ThrowView('View Error', new Response());
        set_exception_handler(array($exception_handler, 'ExceptionHandler'));
        set_error_handler(array($exception_handler, 'ErrorHandler'));
    }

    /**
     * @deprecated
     */
    public function OnInitialize()
    {
    }

    public function BeforeInitialize()
    {
    }

    public function AfterInitialize()
    {
    }
}