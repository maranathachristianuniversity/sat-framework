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
 * Class Value
 * @package satframework\pdc
 */
class Value implements Pdc
{

    var $key;

    var $value;

    /**
     * @param $clause
     * @param $command
     * @param $value
     */
    public function SetCommand($clause, $command, $value = null)
    {
        $this->key = $command;
        $this->value = $value;
    }

    /**
     * @param Response &$response
     * @return mixed
     */
    public function SetStrategy(Response &$response)
    {
        return array($this->key => $this->value);
    }
}