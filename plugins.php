<?php

/**
 * Register CORE
 */

// Register core service provider
$app->register(new Marvin\Marvin\Provider\InstallServiceProvider());

// Require core middlewares
require __DIR__ .'/middlewares.php';

// Mount core controller provider
$app->mount('/admin', new Marvin\Marvin\Controller\AdminControllerProvider());
$app->mount('/install', new Marvin\Marvin\Controller\InstallControllerProvider());

/**
 * Register PLUGINS
 */

foreach ($app['config']['plugins'] as $plugin) {
    if (file_exists($file = __DIR__ .'/../'. $plugin .'/bootstrap.php')) {
    	require $file;
    } elseif (file_exists($file = $config['app_dir'] .'/'. $plugin .'/bootstrap.php')) {
    	require $file;
    } elseif (file_exists($file = __DIR__ .'/vendor/marvin/'. $plugin .'/bootstrap.php')) {
    	require $file;
    } elseif (file_exists($file = __DIR__ .'/../../../../marvin-'. $plugin .'/bootstrap.php')) {
    	require $file;
    }
}
