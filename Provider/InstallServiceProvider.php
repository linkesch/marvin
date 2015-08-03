<?php

namespace Marvin\Marvin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class InstallServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['install_plugins'] = function () {
            return array();
        };

        $app['install_status'] = $app->protect(function ($condition, $success, $failure) use ($app) {
            if ($condition) {
                $result = array(
                    'type' => 'success',
                    'text' => $app['translator']->trans($success),
                );
            } else {
                $result = array(
                    'type' => 'failure',
                    'text' => $app['translator']->trans($failure),
                );
            }

            return $result;
        });

        $app['install'] = $app->protect(function () use ($app) {
            // Installation check
            if ($app['config']['is_installed']) {
                $messages[] = array(
                    'type' => 'success',
                    'text' => '<strong>Marvin is already installed. Enjoy!</strong><br><br>If you want to reinstall it, please remove a data folder manually and run this installation one more time.',
                );
            } else {
                // Base dir existence check
                if (file_exists($app['config']['base_dir']) === false) {
                    // Create data dir
                    $messages[] = $app['install_status'](
                        mkdir($app['config']['base_dir'], 0755),
                        'Base folder was created.',
                        'Problem creating a base folder possibly due to permission settings in the main folder of your application.'
                    );
                }

                // Data dir existence check
                if (file_exists($app['config']['data_dir']) === false) {
                    // Create data dir
                    $messages[] = $app['install_status'](
                        mkdir($app['config']['data_dir'], 0755),
                        'Data folder was created.',
                        'Problem creating a data folder possibly due to permission settings in the main folder of your application.'
                    );
                }

                // Create DB file
                $f = fopen($app['config']['db']['path'], 'w');
                fclose($f);

                // DB file existence check
                $messages[] = $app['install_status'](
                    $f,
                    'DB file was created.',
                    'Problem creating DB file possibly due to permission settings in the data folder.'
                );

                if (file_exists(__DIR__ ."/../Themes")) {
                    \Marvin\Marvin\Install::copy(__DIR__ ."/../Themes", $app['config']['themes_dir']);
                    $messages[] = $app['install_status'](
                        true,
                        'Core theme files were installed',
                        null
                    );
                }

                // Create database
                $sm = $app['db']->getSchemaManager();
                $sm->createDatabase($app['config']['db']['path']);

                // Install plugins
                if (count($app['install_plugins'])) {
                    foreach ($app['install_plugins'] as $plugin) {
                        $messages = array_merge($messages, $plugin());
                    }
                }

                // Count failures
                $errors = 0;
                foreach ($messages as $message) {
                    if ($message['type'] == 'failure') {
                        $errors++;
                    }
                }

                if ($errors == 0) {
                    $config = $app['config'];
                    $config['is_installed'] = true;
                    $app['config'] = $config;
                }

                // Conclusion
                $messages[] = $app['install_status'](
                    $errors == 0,
                    '<strong>Installation completed.</strong>',
                    '<strong>Installation completed with '. $errors .' errors.</strong>'
                );
            }

            return $messages;
        });

        $app['uninstall'] = $app->protect(function () use ($app) {
            if (file_exists($app['config']['db']['path'])) {
                $sm = $app['db']->getSchemaManager();
                $tables = $sm->listTableNames();
                foreach ($tables as $table) {
                    $sm->dropTable($table);
                }
                $sm->dropDatabase($app['config']['db']['path']);
            }

            $config = $app['config'];
            $config['is_installed'] = false;
            $app['config'] = $config;
        });

        $app['reinstall'] = $app->protect(function () use ($app) {
            $app['uninstall']();
            $app['install']();
        });
    }

    public function boot(Application $app)
    {
    }
}
