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

use satframework\Response;

/**
 * Interface Pdc
 * @package satframework\pdc
 */
interface Pdc
{

    /**
     * @param $clause
     * @param $command
     * @param $value
     */
    public function SetCommand($clause, $command, $value);

    /**
     * @param Response &$response
     * @return mixed
     */
    public function SetStrategy(Response &$response);

}