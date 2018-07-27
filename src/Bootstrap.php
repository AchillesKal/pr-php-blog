<?php

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response("Homepage");
$response->send();