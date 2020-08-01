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
 * Class DisplayException
 * @package satframework\pdc
 */
class DisplayException implements Pdc
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
        $this->key = $clause;
        $this->value = $command;
    }

    /**
     * @param Response $response
     * @return mixed
     */
    public function SetStrategy(Response &$response)
    {
        if ($this->value === 'true') {
            $response->displayException = true;
        } elseif ($this->value === 'false') {
            $response->displayException = false;
        }

        return true;
    }
}