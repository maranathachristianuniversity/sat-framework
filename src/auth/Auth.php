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

/**
 * Interface Auth
 * @package satframework\auth
 */
interface Auth
{
    const EXPIRED_ON_CLOSE = null;
    const EXPIRED_1_HOUR = 3600;
    const EXPIRED_1_DAY = 86400;
    const EXPIRED_1_WEEK = 604800;
    const EXPIRED_1_MONTH = 2592000;

    public static function Instance();

    public function Login($username, $password);

    public function Logout();

    public function GetLoginData($data, $permission);

}