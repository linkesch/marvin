<?php

namespace Marvin\Marvin\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class AdminControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        // Homepage
        $controllers->get('/', function () use ($app) {
            return $app->redirect('/admin/'. $app['config']['plugins'][0]);
        });

        return $controllers;
    }
}
