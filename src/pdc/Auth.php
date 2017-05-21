<?php

namespace pukoframework\pdc;

use Exception;
use pukoframework\auth\Session;

class Auth implements Pdc
{

    var $key;
    var $value;

    /**
     * DocsAuth constructor.
     */
    public function __construct()
    {
        header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Last-Modified: ' . gmdate('D, j M Y H:i:s') . ' GMT');
    }


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
     * @return mixed
     * @throws Exception
     */
    public function SetStrategy()
    {
        if ($this->value === 'true') {
            if (!Session::IsSession()) {
                throw new Exception('Authentication Required');
            }
        }
        return true;
    }

}