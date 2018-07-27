<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\RequestStack;

$containerBuilder = new ContainerBuilder();

$containerBuilder->register('context', RequestContext::class);

$containerBuilder->register('matcher', UrlMatcher::class)
    ->setArguments(array($routes, new Reference('context')));

$containerBuilder->register('request_stack', RequestStack::class);


return $containerBuilder;