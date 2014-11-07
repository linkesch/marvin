<?php

use Symfony\Component\HttpFoundation\Request;

// Redirect to installation, if DB file doesn't exist
$app->before(function (Request $request) use ($app) {
    if ($app['debug'] && $app['config']['env'] != 'test' && $app['config']['is_installed'] == false && preg_match('/^\/install/', $request->getRequestUri()) == false) {
        return $app->redirect('/install');
    }
});
