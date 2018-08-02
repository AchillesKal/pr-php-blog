<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use PrPHPBlog\Framework\Rendering\TwigTemplateRendererFactory;

$containerBuilder = new ContainerBuilder();

$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/src'));
$loader->load('services.yml');

$containerBuilder->register('context', RequestContext::class);

$containerBuilder->register('matcher', UrlMatcher::class)
    ->setArguments(array($routes, new Reference('context')));

$containerBuilder->register('request_stack', RequestStack::class);

$containerBuilder->register('controller_resolver', ControllerResolver::class);
$containerBuilder->register('argument_resolver', ArgumentResolver::class);

$containerBuilder->register('twig', TwigTemplateRendererFactory::class)
    ->addMethodCall('create');

return $containerBuilder;
