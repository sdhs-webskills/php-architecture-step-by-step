<?php

use src\core\Router;

define('ROOT', __dir__);
define('BASE_URI', '/step7-router-app');

include_once(ROOT . '/src/core/lib.php');

$router = new Router(BASE_URI);

$router->get('/', function ($param) {
    print_pre($param);
});

$router->run();

