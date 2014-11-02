<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
    'twig.options' => array('debug' => true)
));

$app->get('/', function() use($app) {
	$args = array(
		'name' => 'PHP Silex Twig Skeleton',
		'message' => 'Hello, Shake the Skeleton'
	);

	return $app['twig']->render('main.html', array('app' => $app, 'args' => $args));
});

$app->run();