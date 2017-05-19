<?php

/**
 * Routing
 */
class Routes
{
    private $routes = [];

    public function register($route)
    {
        $this->routes = $route;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }
        throw new Exception("Router not available");
    }
}
