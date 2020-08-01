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
 * Class Schema
 * @package satframework\pda
 */
class Table
{

    /**
     * @param Model $obj
     * @throws Exception
     */
    public static function create(Model $obj)
    {
        if (!$obj instanceof Model) {
            throw new Exception('parameter must be instance of Model');
        }


    }

    public static function rename()
    {

    }

    public static function drop()
    {

    }

    public static function dropIfExists()
    {

    }

    public static function hasTable()
    {

    }

    public static function hasColumn()
    {

    }

}