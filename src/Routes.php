<?php declare(strict_types=1);

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('front_page',
    new Routing\Route('/',
        array(
            '_controller' => 'PrPhpBlog\FrontPage\Presentation\FrontPageController::index'
        ),
        [],[],"",[],
        "GET"
    )
);

return $routes;