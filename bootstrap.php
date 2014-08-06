<?php

// Initialize Silex App
$app = new Silex\Application();


// Get configuration
$app['config'] = require __DIR__ .'/config.php';


// Register providers
require __DIR__ .'/providers.php';


// Register plugins
require __DIR__ .'/plugins.php';


// Load custom scripts
if(file_exists($app['config']['app_dir'] .'/bootstrap.php'))
{
    require $app['config']['app_dir'] .'/bootstrap.php';
}

// Return app
return $app;
