<?php
/**
 * Created by PhpStorm.
 * User: Luke Hardiman
 * Date: 10/08/2015
 * Time: 10:33 PM
 */
//Grab the composer Autoloader!
$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';
$config = require dirname(__DIR__). "/app/config/config.php";

/**
 * Read auto-loader
 */
require dirname(__DIR__). "/app/config/loader.php";

/**
 * Read services
 */
require dirname(__DIR__)."/app/config/services.php";