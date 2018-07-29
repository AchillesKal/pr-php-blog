<?php

namespace PrPhpBlog\FrontPage\Presentation;

use Symfony\Component\HttpFoundation\Response;

class FrontPageController
{
    public function index()
    {
        return new Response("Homepage");
    }
}
