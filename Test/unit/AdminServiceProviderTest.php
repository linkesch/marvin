<?php

use Marvin\Marvin\Test\FunctionalTestCase;

class AdminServiceProviderTest extends FunctionalTestCase
{
    public function testInstallStatusSuccess()
    {
        $this->assertSame(array(
            'type' => 'success',
            'text' => 'success message',
        ), $this->app['install_status'](true, 'success message', 'failure message'));
    }

    public function testInstallStatusFailure()
    {
        $this->assertSame(array(
            'type' => 'failure',
            'text' => 'failure message',
        ), $this->app['install_status'](false, 'success message', 'failure message'));
    }

    public function testInstallOnExistingInstallation()
    {
        $result = $this->app['install']();
        $this->assertContains('already installed', $result[0]['text']);
    }

    public function testFreshInstall()
    {
        $this->app['uninstall']();

        $result = $this->app['install']();
        $result = end($result);

        $this->assertTrue(file_exists($this->app['config']['db']['path']));
        $this->assertTrue($this->app['config']['is_installed']);
        $this->assertContains('completed', $result['text']);
    }

    public function testUninstall()
    {
        $this->app['uninstall']();

        $this->assertFalse(file_exists($this->app['config']['db']['path']));
        $this->assertFalse($this->app['db']->getSchemaManager()->tablesExist(array('user', 'page')));
        $this->assertFalse($this->app['config']['is_installed']);
    }

    public function testReinstall()
    {
        $this->app['uninstall'] = $this->app->protect(function () {
            $this->assertTrue(true);
        });

        $this->app['install'] = $this->app->protect(function () {
            $this->assertTrue(true);
        });

        $this->app['reinstall']();
    }
}
