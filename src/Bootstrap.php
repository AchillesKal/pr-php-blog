<?php

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

$request = Request::createFromGlobals();

$routes = include(ROOT_DIR . '/src/Routes.php');
$container = include(ROOT_DIR . '/src/container.php');

$container->get('context')->fromRequest($request);
$matcher = $container->get('matcher');

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $controller =  $container->get('controller_resolver')->getController($request);
    $arguments = $container->get('argument_resolver')->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);
} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();