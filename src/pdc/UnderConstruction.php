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

use pte\exception\PteException;
use pte\Pte;
use satframework\Framework;
use satframework\Response;

/**
 * Class UnderConstruction
 * @package satframework\pdc
 */
class UnderConstruction implements Pdc
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
     * @throws PteException
     */
    public function SetStrategy(Response &$response)
    {
        if ($this->value === 'true') {

            $render = new Pte(false, false);

            $render->SetValue(array());
            if ($response->useHtmlLayout) {
                $render->SetHtml(sprintf('%s/assets/system/construction.html', Framework::$factory->getRoot()));
                echo $render->Output(null, Pte::VIEW_HTML);
            } else {
                echo $render->Output(null, Pte::VIEW_JSON);
            }
            exit();
        }
        return true;
    }
}