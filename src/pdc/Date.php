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

use DateTime;
use Exception;
use satframework\Response;

/**
 * Class Date
 * @package satframework\pdc
 */
class Date implements Pdc
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
     * @param Response &$response
     * @return mixed
     * @throws Exception
     */
    public function SetStrategy(Response &$response)
    {
        $now = date('d-m-Y H:i:s');
        $target = (new DateTime($this->value))->format('d-m-Y H:i:s');
        if (strcasecmp($this->key, 'before') === 0) {
            if ($now > $target) {
                throw new Exception('URL available before ' . $this->value);
            }
        }
        if (strcasecmp($this->key, 'after') === 0) {
            if ($now < $target) {
                throw new Exception('URL available after ' . $this->value);
            }
        }
        return true;
    }
}