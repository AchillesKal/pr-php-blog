<?php

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;

$request = Request::createFromGlobals();
$fileLocator = new FileLocator(array(__DIR__));
$loader = new YamlFileLoader($fileLocator);
$routes = $loader->load('routes.yaml');

$container = include(ROOT_DIR . '/src/container.php');

$container->get('context')->fromRequest($request);
$matcher = $container->get('matcher');

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $controller = $container->get('controller_resolver')->getController($request);
    $arguments = $container->get('argument_resolver')->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);
} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$container->compile();
$dumper = new PhpDumper($container);
file_put_contents(__DIR__.'/cached_container.php', $dumper->dump());

$response->send();
