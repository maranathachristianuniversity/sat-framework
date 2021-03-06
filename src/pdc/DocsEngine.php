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

use Error;
use Exception;
use satframework\Response;

/**
 * Class DocsEngine
 * @package satframework\pdc
 */
class DocsEngine
{

    /**
     * @var Value
     */
    var $clause;

    /**
     * @var Response
     */
    var $response_objects;

    /**
     * @var Pdc
     */
    var $class;

    var $command;

    var $return_command = array();

    var $value = '';

    /**
     * @param $raw_docs
     * @param $return_data
     * returned from controller
     *
     * @throws Exception
     */
    public function PDCParser($raw_docs, &$return_data)
    {
        preg_match_all('(#[ a-zA-Z0-9-:.+/_\\\@]+)', $raw_docs, $result, PREG_PATTERN_ORDER);
        if (count($result[0]) > 0) {
            foreach ($result[0] as $key => $value) {

                $preg = explode(' ', $value);

                $this->clause = str_replace('#', '', $preg[0]);
                $this->command = $preg[1];

                $this->value = '';

                foreach ($preg as $k => $v) {
                    switch ($k) {
                        case 0:
                        case 1:
                            break;
                        default:
                            if ($k !== sizeof($preg) - 1) {
                                $this->value .= $v . ' ';
                            } else {
                                $this->value .= $v;
                            }
                            break;
                    }
                }
                try {
                    $class = '\\satframework\\pdc\\' . $this->clause;
                    $this->class = new $class();
                    $this->class->SetCommand($this->clause, $this->command, $this->value);
                    $returns = $this->class->SetStrategy($this->response_objects);
                    if (is_array($returns)) {
                        $this->return_command = array_merge($this->return_command, $returns);
                    }
                } catch (Error $error) {
                    $false = "SAT Error (PTE001) PTE Command <b>#%s %s %s</b> unregistered.";
                    $false = sprintf($false, $this->clause, $this->command, $this->value);
                    throw new Exception($false);
                }

                if (is_array($return_data) && is_array($this->return_command)) {
                    foreach ($this->return_command as $k => $v) {
                        $return_data[$k] = $v;
                    }
                }
            }
        }
    }

    /**
     * @param Response $response
     */
    public function SetResponseObjects(Response $response)
    {
        $this->response_objects = $response;
    }

    /**
     * @return Response
     */
    public function GetResponseObjects()
    {
        return $this->response_objects;
    }

    public function GetReturns()
    {
        return $this->return_command;
    }

}
