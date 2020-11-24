<?php
namespace src\controller;

use src\core\Router;

class UserController {

    private Router $router;

    function __construct(Router $router) {
        $router->get('/api/user', fn($params) => $this->getUser($params));
    }

    private function getUser($params) {
        header("Content-Type: application/json");
        $user = fetchData("user");
        echo json_encode($user);
    }
}
