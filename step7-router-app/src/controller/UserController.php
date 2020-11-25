<?php
namespace src\controller;

use src\core\Router;

class UserController {

    private Router $router;

    function __construct(Router $router) {
        $router->get('/api/users', fn($params) => $this->getUsers($params));
        $router->get('/api/user/([0-9]+)', fn($params) => $this->getUser($params));
        $router->get('/api/user', fn($params) => $this->getUserByEmail($params));
        $router->post('/api/user', fn($params) => $this->setUser($params));
    }

    private function getUsers($params) {
        header("Content-Type: application/json");
        $users = fetchData("users");
        echo json_encode($users);
    }

    private function getUser($params) {
        [, $userId] = $params;
        header("Content-Type: application/json");
        $users = fetchData("users");
        $user = current(array_filter($users, fn($user) => $user->id == $userId));
        echo json_encode($user);
    }

    private function getUserByEmail($params) {
        header("Content-Type: application/json");
        $users = fetchData("users");
        $user = current(array_filter($users, fn($user) => $user->email == $_GET['email']));
        echo json_encode($user);
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
}
