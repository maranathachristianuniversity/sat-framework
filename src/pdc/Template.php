<?php

namespace pukoframework\pdc;

use pukoframework\Response;

class Template extends Response implements Pdc
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
     * @return mixed
     */
    public function SetStrategy()
    {
        switch ($this->value) {
            case 'master':
                if (strcasecmp(str_replace(' ', '', $this->value), 'false') === 0) {
                    $this->useMasterLayout = false;
                }
                break;
            case 'html':
                if (strcasecmp(str_replace(' ', '', $this->value), 'false') === 0) {
                    $this->useHtmlLayout = false;
                }
                break;
        }
    }
}