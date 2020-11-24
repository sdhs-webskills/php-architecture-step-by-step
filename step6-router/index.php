<?php
function print_pre ($obj) {
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
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
        echo $_SERVER['REQUEST_METHOD'];
        [$callback, $params] = current(array_reduce($this->routes, function ($routes, $route) {
            [$method, $uri, $callback] = $route;
            $uri = '/^'. str_replace("/", "\/", $uri) .'$/';

            if (
                $method !== strtolower($_SERVER['REQUEST_METHOD']) ||
                !preg_match($uri, $this->requestUri)
            ) return $routes;

            preg_match_all($uri, $this->requestUri, $params, 2, 0);
            $routes[] = [$callback, $params[0]];

            return $routes;
        }, []));

        $callback($params);
    }
}

$router = new Router('/step6-router');

$router->get('/', function ($param) {
    print_pre($param);
});

$router->get('/test', function ($param) {
    print_pre("is get test");
    print_pre($param);
});

$router->post('/test', function ($param) {
    print_pre("is post test");
    print_pre($param);
    print_pre($_POST);
});

$router->get('/api/member/([0-9]+)', function ($param) {
    print_pre($param);
});

$router->get('/api/member/([0-9]+)/board/([0-9]+)', function ($param) {
    print_pre($param);
});

$router->run();

