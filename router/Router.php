<?php

class Router {
    public array $routes = [];

    public function define($routes): void {
        $this->routes = $routes;
    }

    /**
     * @throws Exception
     */
    public function direct($uri) {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw new Exception('No route defined for this URI');
    }
}