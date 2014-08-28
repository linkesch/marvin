<?php

use Marvin\Marvin\Test\FunctionalTestCase;

class AdminTest extends FunctionalTestCase
{
    public function testFreshInstall()
    {
        $this->app['install'] = $this->app->protect(function () {
            $this->assertTrue(true);
        });

        $client = $this->createClient();
        $client->request('GET', '/install');

        $this->assertTrue($client->getResponse()->isOk());
    }
}
