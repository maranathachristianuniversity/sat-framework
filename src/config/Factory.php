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

namespace satframework\config;

/**
 * Class Factory
 * @package satframework\config
 */
class Factory
{

    /**
     * @var mixed|string
     */
    private $cli_param = null;

    private $base = '';

    private $root = '';

    private $start = '';

    private $env = '';

    public function __construct($config = array())
    {
        $this->cli_param = isset($config['cli_param']) ? $config['cli_param'] : '';
        $this->base = $config['base'];
        $this->root = $config['root'];
        $this->start = $config['start'];
        $this->env = $config['environment'];
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @return string
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getCliParam()
    {
        return $this->cli_param;
    }

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->env;
    }


}