<?php

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$routes = include(ROOT_DIR . '/src/Routes.php');
$container = include(ROOT_DIR . '/src/container.php');

$container->get('context')->fromRequest($request);
$matcher = $container->get('matcher');

$response = new Response("Homepage");
$response->send();