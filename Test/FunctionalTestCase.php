<?php

namespace Marvin\Marvin\Test;

use Silex\WebTestCase;

class FunctionalTestCase extends WebTestCase
{
    public function createApplication()
    {
        $env = 'test';
        $app = require __DIR__.'/../bootstrap.php';

        $app["swiftmailer.transport"] = new \Swift_Transport_NullTransport($app['swiftmailer.transport.eventdispatcher']);
        $app['mailer.logger'] = new MessageLogger();
        $app['mailer']->registerPlugin($app['mailer.logger']);

        $app['debug'] = true;
        $app['exception_handler']->disable();
        $app['session.test'] = true;
        $app['reinstall']();

        return $this->app = $app;
    }

    protected function logIn(&$client)
    {
        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('login')->form();
        $crawler = $client->submit($form, array(
            '_username' => 'admin@test.com',
            '_password' => 'foo',
        ));
    }
}
