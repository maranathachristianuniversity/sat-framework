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
 * Class ClearOutput
 * @package satframework\pdc
 */
class ClearOutput implements Pdc
{

    /**
     * @var string
     */
    var $key;

    /**
     * @var string
     */
    var $command;

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
        $this->command = $command;
        $this->value = $value;
    }

    /**
     * @param Response &$response
     * @return mixed
     */
    public function SetStrategy(Response &$response)
    {
        if ($this->value === 'true') {
            switch ($this->command) {
                case 'binary':
                    $response->disableOutput = true;
                    break;
            }
        } elseif ($this->value === 'false') {
            switch ($this->command) {
                case 'binary':
                    $response->disableOutput = false;
                    break;
            }
        }

        return true;
    }

}