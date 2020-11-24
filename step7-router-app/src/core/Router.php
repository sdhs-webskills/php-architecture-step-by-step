<?php

namespace src\core;

class Router {
    private array $routes = [];
    private String $baseUri;
    private String $requestUri;

    function __construct($baseUri) {
        $this->baseUri = $baseUri;
        $this->requestUri = str_replace($baseUri, "", $_SERVER['REQUEST_URI']);
    }

    public function use($uri, $callback) {

    }

    public function get($uri, $callback) {
        $this->routes[] = ["get", $uri, $callback];
    }

    public function post($uri, $callback) {
        $this->routes[] = ["post", $uri, $callback];
    }

    public function delete($uri, $callback) {
        $this->routes[] = ["delete", $uri, $callback];
    }

    public function put($uri, $callback) {
        $this->routes[] = ["put", $uri, $callback];
    }

    public function run() {
        $routes = array_reduce($this->routes, function ($routes, $route) {
            [$method, $uri, $callback] = $route;
            $uri = '/^'. str_replace("/", "\/", $uri) .'$/';

            if (
                $method !== strtolower($_SERVER['REQUEST_METHOD']) ||
                !preg_match($uri, $this->requestUri)
            ) return $routes;

            preg_match_all($uri, $this->requestUri, $params, 2, 0);
            $routes[] = [$callback, $params[0]];

            return $routes;
        }, []);

        if (count($routes) === 0) {
            echo 'Not Found ' . $this->requestUri;
            return;
        }
        [$callback, $params] = current($routes);
        $callback($params);
    }
}
