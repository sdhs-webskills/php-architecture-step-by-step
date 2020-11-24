<?php
    class Router {
        private Array $routes = [];
        private String $baseUri;

        function Router($baseUri) {
            $this->baseUri = $baseUri;
        }

        public function staticPath($path) {

        }

        public function use($uri, $callback) {

        }

        public function get($uri, $callback) {

        }

        public function post($uri, $callback) {

        }
    }

    $router = new Router('/step6-router');

    $router->staticPath('/static');

    $router->get('/', function ($param) {

    });

