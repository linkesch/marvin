<?php

/**
 * Register CORE
 */

// Register core service provider
$app->register(new Marvin\Core\Provider\AdminServiceProvider());

// Require core middlewares
require __DIR__ .'/middlewares.php';

// Mount core controller provider
$app->mount('/admin', new Marvin\Core\Controller\AdminControllerProvider());
$app->mount('/install', new Marvin\Core\Controller\InstallControllerProvider());



/**
 * Register PLUGINS
 */

foreach($app['config']['plugins'] as $plugin)
{
    require __DIR__ .'/../'. ucfirst($plugin) .'/bootstrap.php';
}
