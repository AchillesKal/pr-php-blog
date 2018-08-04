<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ProjectServiceContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * @internal but protected for BC on cache:clear
     */
    protected $privates = array();

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = array();

        $this->aliases = array();
    }

    public function reset()
    {
        $this->privates = array();
        parent::reset();
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return array(
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'argument_resolver' => true,
            'context' => true,
            'controller_resolver' => true,
            'front_page.controller' => true,
            'matcher' => true,
            'request_stack' => true,
            'twig' => true,
        );
    }

    public function getParameter($name)
    {
        $name = (string) $name;

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = array();
    private $dynamicParameters = array();

    /**
     * Computes a dynamic parameter.
     *
     * @param string The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'routes' => Symfony\Component\Routing\RouteCollection::__set_state(array(
   'routes' => 
  array (
    'homepage' => 
    Symfony\Component\Routing\Route::__set_state(array(
       'path' => '/',
       'host' => '',
       'schemes' => 
      array (
      ),
       'methods' => 
      array (
      ),
       'defaults' => 
      array (
        '_controller' => 'PrPhpBlog\\FrontPage\\Presentation\\FrontPageController::index',
      ),
       'requirements' => 
      array (
      ),
       'options' => 
      array (
        'compiler_class' => 'Symfony\\Component\\Routing\\RouteCompiler',
      ),
       'condition' => '',
       'compiled' => 
      Symfony\Component\Routing\CompiledRoute::__set_state(array(
         'variables' => 
        array (
        ),
         'tokens' => 
        array (
          0 => 
          array (
            0 => 'text',
            1 => '/',
          ),
        ),
         'staticPrefix' => '/',
         'regex' => '#^/$#sD',
         'pathVariables' => 
        array (
        ),
         'hostVariables' => 
        array (
        ),
         'hostRegex' => NULL,
         'hostTokens' => 
        array (
        ),
      )),
    )),
    'about' => 
    Symfony\Component\Routing\Route::__set_state(array(
       'path' => '/about',
       'host' => '',
       'schemes' => 
      array (
      ),
       'methods' => 
      array (
      ),
       'defaults' => 
      array (
        '_controller' => 'PrPhpBlog\\About\\Presentation\\AboutController::index',
      ),
       'requirements' => 
      array (
      ),
       'options' => 
      array (
        'compiler_class' => 'Symfony\\Component\\Routing\\RouteCompiler',
      ),
       'condition' => '',
       'compiled' => NULL,
    )),
  ),
   'resources' => 
  array (
    '/home/achilleskal/Projects/php/pr-php-blog/src/routes.yaml' => 
    Symfony\Component\Config\Resource\FileResource::__set_state(array(
       'resource' => '/home/achilleskal/Projects/php/pr-php-blog/src/routes.yaml',
    )),
  ),
)),
        );
    }
}
