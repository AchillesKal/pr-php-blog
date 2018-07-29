<?php

namespace PrPhpBlog\FrontPage\Presentation;

use Symfony\Component\HttpFoundation\Response;

class AboutController
{
    public function index()
    {
        return new Response("About");
    }
}