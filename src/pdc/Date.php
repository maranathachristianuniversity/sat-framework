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
    public function SetCommand($clause, $command, $value)
    {
        $this->key = $command;
        $this->value = $value;
    }

    /**
     * @param Response &$response
     * @return mixed
     * @throws Exception
     */
    public function SetStrategy(Response &$response)
    {
        $now = new DateTime();
        $target = DateTime::createFromFormat('d-m-Y H:i:s', $this->value);
        if (trim($this->key) === 'before') {
            if ($now > $target) {
                throw new Exception('URL available before ' . $this->value);
            }
        }
        if (trim($this->key) === 'after') {
            if ($now < $target) {
                throw new Exception('URL available after ' . $this->value);
            }
        }
        return true;
    }
}