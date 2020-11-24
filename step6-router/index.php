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
        [$callback, $params] = current(array_reduce($this->routes, function ($routes, $route) {
            [$method, $uri, $callback] = $route;
            $uri = '/^'. str_replace("/", "\/", $uri) .'$/';
            if (!preg_match($uri, $this->requestUri)) return $routes;
            preg_match_all($uri, $this->requestUri, $params, 2, 0);
            $routes[] = [$callback, $params[0]];
            return $routes;
        }, []));

        $callback($params);
    }
}

$router = new Router('/step6-router');

$router->get('/', function ($param) {
    echo "root";
});

$router->get('/test', function ($param) {
    echo "test";
});

$router->get('/api/([0-9]+)', function ($param) {
    print_pre($param);
});

$router->run();

