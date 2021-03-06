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

namespace satframework\peh;

use Exception;
use satframework\auth\Session;

/**
 * Class ValueException
 * @package satframework\peh
 */
class ValueException extends Exception
{

    /**
     * @var array
     */
    private $validation = array();

    /**
     * ValueException constructor.
     * @param string $message
     * @param array $validate
     */
    public function __construct($message = '', $validate = array())
    {
        parent::__construct($message, SatException::value);
        $this->validation = $validate;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function Prepare($key, $value)
    {
        $this->validation['#' . $key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getValidations()
    {
        return $this->validation;
    }

    /**
     * @param $arrayData
     * @param string $message
     *
     * @return array
     * @throws Exception
     */
    public function Throws($arrayData, $message = '')
    {
        Session::GenerateSecureToken();

        if (count($this->validation) > 0) {
            $response = array_merge($this->validation, $arrayData);
            $this->validation['ExceptionMessage'] = $message;

            $response['Exception'] = $this->validation;
            return $response;
        }

        return [];
    }
}
