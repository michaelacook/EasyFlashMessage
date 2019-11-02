<?php

/**
* Adds a flash message to the global environment
*
* PHP version > 7.1.27
* @category PHP
* @author Michael Cook <mcook0775@gmail.com>
* @copyright 2019 Michael Cook
* @license https://en.wikipedia.org/wiki/MIT_License MIT License
*/


namespace EasyFlashMessage\Middleware;


class EasyFlashMessageMiddleware
{

    // must be the Pimple dependency injection container
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
    * To use, instantiate a new FlashMessage object in the controller,
    * use {{ flash|raw }} in view
    */
    public function __invoke($request, $response, $next)
    {
        if (isset($_SESSION['easyFlash'])) {
            $this->container->view->getEnvironment()->addGlobal('flash', $_SESSION['easyFlash']);
            unset($_SESSION['easyFlash']);
        }
        $response = $next($request, $response);
        return $response;
    }
}
