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

namespace satframework\auth;

class SatAuth
{
    /**
     * @var array|null
     */
    var $secure;

    /**
     * @var array|null
     */
    var $permission;

    /**
     * PukoAuth constructor.
     * @param $secure
     * @param $permission
     */
    public function __construct($secure, $permission)
    {
        $this->secure = $secure;
        $this->permission = $permission;
    }


}