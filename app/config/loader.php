<?php
$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    array(
        "Api\Response"    => $config->application->libraryDir,

    )
);

$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,

    )
)->register();

//Sentry module is located from https://cartalyst.com/manual/sentry/2.1

//register sentry namespace
require_once($config->application->vendor.'autoload.php');

// Create a new Database connection
use Illuminate\Database\Capsule\Manager as Capsule;

// Create the Sentry alias
class_alias('Cartalyst\Sentry\Facades\Native\Sentry', 'Sentry');

// Create a new Database connection
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $config->database->host,
    'database'  => $config->database->dbname,
    'username'  => $config->database->username,
    'password'  => $config->database->password,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);

$capsule->bootEloquent();
