<?php
namespace src\controller;

use src\core\Router;

class UserController {

    private Router $router;

    function __construct(Router $router) {
        $router->get('/api/users', fn($params) => $this->getUser($params));
        $router->post('/api/user', fn($params) => $this->setUser($params));
        $router->put('/api/user/([0-9])+', fn($params) => $this->putUser($params));
    }

    private function getUser($params) {
        header("Content-Type: application/json");
        $users = fetchData("users");
        echo json_encode($users);
    }

    private function setUser($params) {
        $users = fetchData("users") ?? [];
        $users[] = [
            "id" => getMicroTime(),
            "name" => $_POST['name'],
            "email" => $_POST['email'],
        ];
        setData($users, "users");
        echo json_encode([ 'success' => true ]);
    }

    private function putUser($params) {
        echo json_encode([ 'success' => true, 'put' => true, 'body' => $_POST ]);
    }
}
