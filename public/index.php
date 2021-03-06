<?php

use HpCerGar\Controller\BooksController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app['books.controller'] = $app->share(function() use ($app) {
    return new BooksController();
});

$app->get('/hello/{name}', function($name) use($app) {
    return 'Hola '.$app->escape($name)."\n";
});

$app->get('/books', "books.controller:indexAction");
$app->get('/books/{isbn}', "books.controller:getAction");


$app->run();