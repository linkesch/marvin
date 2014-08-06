<?php

use Marvin\Marvin\Test\FunctionalTestCase;

class adminTest extends FunctionalTestCase
{
    public function testFreshInstall()
    {
        $this->app['install'] = $this->app->protect(function () {
            $this->assertTrue(true);
        });

        $client = $this->createClient();
        $crawler = $client->request('GET', '/install');

        $this->assertTrue($client->getResponse()->isOk());
    }
}
