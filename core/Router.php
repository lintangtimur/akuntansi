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
    private $routes = [];

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
     * Direct spesific uri in current routes
     * @param  string $uri URI
     * @return string      from asosiatif array
     */
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
