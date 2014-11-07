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
if (file_exists($app['config']['app_dir'] .'/bootstrap.php')) {
    require $app['config']['app_dir'] .'/bootstrap.php';
}

// Error page
$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug'] == false) {
        $code = ($e instanceof Symfony\Component\HttpKernel\Exception\HttpException) ? $e->getStatusCode() : 500;

        return $app['twig']->render('admin/error.twig', array('code' => $code));
    }
});

// Return app
return $app;
