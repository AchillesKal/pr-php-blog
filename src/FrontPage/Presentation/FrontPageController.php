<?php

namespace PrPhpBlog\FrontPage\Presentation;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PrPhpBlog\Framework\Rendering\TemplateRenderer;

class FrontPageController
{
    private $templateRenderer;

    public function __construct(TemplateRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function index(Request $request): Response
    {
        $content = "Homepage";
        return new Response($content);
    }
}
