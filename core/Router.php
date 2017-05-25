<?php

/**
 * Routing
 */
class Router
{
    private $routes = [];

    public function register(array $route)
    {
        $this->routes = $route;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        } else {
            return $this->routes["404"];
        }
        // throw new Exception("TIDAK DITEMUKAN");
    }
}
