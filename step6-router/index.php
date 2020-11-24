<?php
function print_pre ($obj) {
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
    exit;
}
class Router {
    private Array $routes = [];
    private String $baseUri;
    private String $requestUri;

    function Router($baseUri) {
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

    public function run() {
        array_filter($this->routes);
    }
}

$router = new Router('/step6-router');

$router->get('/', function ($param) {

});

$router->get('/test', function ($param) {

});

$router->run();

