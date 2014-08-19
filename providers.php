<?php


// Register providers

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_sqlite',
        'path' => $app['config']['db']['path'],
    ),
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $app['config']['twig']['paths'],
    'twig.form.templates' => array('form/bootstrap.twig'),
));
$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    $twig->addExtension(new Marvin\Marvin\Twig\BootstrapFormExtension());
    $twig->addExtension(new Marvin\Marvin\Twig\BootstrapIconExtension('glyphicon'));

    return $twig;
}));

$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Cocur\Slugify\Bridge\Silex\SlugifyServiceProvider());
