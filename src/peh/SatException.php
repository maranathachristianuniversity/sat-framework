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

namespace satframework\peh;

/**
 * Interface SatException
 * @package satframework\peh
 */
interface SatException
{

    /**
     * error code for service
     */
    const service = 1011;

    /**
     * error code for view
     */
    const view = 1012;

    /**
     * error code for value
     */
    const value = 1013;

    /**
     * error code for console
     */
    const console = 1014;

    /**
     * @param $error
     */
    public function ExceptionHandler($error);

    /**
     * @param $error
     * @param $message
     * @param $file
     * @param $line
     */
    public function ErrorHandler($error, $message, $file, $line);
}
