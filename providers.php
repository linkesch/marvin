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
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Cocur\Slugify\Bridge\Silex\SlugifyServiceProvider());
