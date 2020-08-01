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

namespace satframework;

use pte\PteCache;

/**
 * Class Response
 * @package satframework
 */
class Response
{
    /**
     * @var string
     */
    public $sourceFile;

    /**
     * @var bool
     */
    public $htmlMaster = false;

    /**
     * @var bool
     */
    public $useMasterLayout = true;

    /**
     * @var bool
     */
    public $useHtmlLayout = true;

    /**
     * @var PteCache
     */
    public $cacheDriver = null;

    /**
     * @var bool
     */
    public $displayException = true;

    /**
     * @var bool
     */
    public $disableOutput = false;

}