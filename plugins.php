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
    $pluginBootstrap = __DIR__ .'/../'. $plugin .'/bootstrap.php';
    $pluginBootstrap = file_exists($pluginBootstrap) ? $pluginBootstrap : $config['app_dir'] .'/'. $plugin .'/bootstrap.php';

    if (file_exists($pluginBootstrap)) {
        require $pluginBootstrap;
    }
}
