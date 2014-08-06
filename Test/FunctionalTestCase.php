<?php

namespace Marvin\Marvin\Test;

use Silex\WebTestCase;

class FunctionalTestCase extends WebTestCase
{
    public function createApplication()
    {
        $env = 'test';
        $app = require __DIR__.'/../bootstrap.php';
        $app['debug'] = true;
        $app['exception_handler']->disable();
        $app['session.test'] = true;
        $app['reinstall']();

        return $this->app = $app;
    }

    protected function logIn(&$client)
    {
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('Sign in')->form();
        $crawler = $client->submit($form, array(
            '_username' => 'admin',
            '_password' => 'foo',
        ));
    }
}
