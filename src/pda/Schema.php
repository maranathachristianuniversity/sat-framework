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

namespace satframework\pda;

use Exception;

/**
 * Class Database
 * @package satframework\pda
 */
class Schema
{

    /**
     * @param $name
     * @return mixed|null
     * @throws Exception
     */
    public static function createDB($name)
    {
        $result = DBI::Prepare("CREATE DATABASE IF NOT EXISTS {$name};")->Run();
        return $result;
    }

    /**
     * @param $name
     * @return mixed|null
     * @throws Exception
     */
    public static function dropDB($name)
    {
        $result = DBI::Prepare("DROP DATABASE {$name};")->Run();
        return $result;
    }

    /**
     * @param $name
     * @param $path
     * @return mixed|null
     * @throws Exception
     */
    public static function backupDB($name, $path)
    {
        $result = DBI::Prepare("BACKUP DATABASE {$name} TO DISK = '{$path}';")->Run();
        return $result;
    }

}