<?php

/**
 * Untuk routing URL
 */
class Router
{
    /**
   * penampungan URI
   * @var array
   */
    public $routes = [
      "GET" => [],
      "POST" => []
    ];

    /**
     * register routing array in routes
     * @param  array  $route routing url akan diregistrasikan
     * @return array        routing url
     */
    public function register(array $route)
    {
        $this->routes = $route;
    }

    /**
     * register get routes
     * @param  string $uri        link
     * @param  string $controller controller/[contreolller]
     * @return array             from array[GET]
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * POST method
     * @param  string $uri        uri
     * @param  string $controller path destination
     * @return array             from array[POST]
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * direct uri
     * @param  string $uri         request URI
     * @param  string $requestType GET/POST
     * @return mixed              hasil akan keredirect ke
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->routes[$requestType][$uri];
        } else {
            return $this->routes["404"];
        }
        // throw new Exception("TIDAK DITEMUKAN");
    }
}
