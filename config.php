<?php

// Default config
$config['env'] = isset($env) ? $env : 'prod';

$config['website']['name'] = 'Marvin';
$config['website']['description'] = 'Marvin is a micro CMS for PHP 5.3';
$config['website']['url'] = 'http://marvin.linkesch.sk';
$config['website']['email'] = 'your@email.com';

$config['base_dir'] = __DIR__ .'/../../..';
$config['app_dir'] = $config['base_dir'] .'/app';
$config['data_dir'] = $config['base_dir'] .'/data';
$config['themes_dir'] = $config['base_dir'] .'/app/themes';
$config['web_dir'] = $config['base_dir'] .'/web';
$config['upload_dir'] = $config['web_dir'] .'/uploads';
$config['public_upload_dir'] = '/uploads';
$config['theme'] = 'default';
$config['db']['path'] = $config['data_dir'] . ($config['env'] == 'test' ? '/test.db' : '/app.db');
$config['db']['name'] = 'marvin';
$config['is_installed'] = file_exists($config['db']['path']);
$config['twig']['paths'][] = __DIR__ .'/View';

// Plugin initialization
$config['plugins'] = array('pages', 'users');

// Override defaults by app config
$appConfigFile = $config['app_dir'] .'/config.php';
if (file_exists($appConfigFile)) {
    require $appConfigFile;
}

// Add themes views to twig paths
$config['twig']['paths'][] = $config['themes_dir'];

// Add plugins views to twig paths
foreach ($config['plugins'] as $plugin) {
    $pluginViews = __DIR__ .'/../'. $plugin .'/View';
    $pluginViews = file_exists($pluginViews) ? $pluginViews : $config['app_dir'] .'/'. $plugin .'/View';

    if (file_exists($pluginViews)) {
        $config['twig']['paths'][] = $pluginViews;
    }
}

return $config;
