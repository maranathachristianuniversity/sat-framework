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

use satframework\Framework;
use satframework\Response;

/**
 * Class Master
 * @package satframework\pdc
 */
class Master implements Pdc
{

    /**
     * @var string
     */
    var $key;

    /**
     * @var string
     */
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
     * @param Response &$response
     * @return mixed
     */
    public function SetStrategy(Response &$response)
    {
        if (file_exists(Framework::$factory->getRoot() . '/assets/master/' . $this->value)) {
            $response->htmlMaster = Framework::$factory->getRoot() . '/assets/master/' . $this->value;
            return true;
        } else {
            return false;
        }
    }
}