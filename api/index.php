<?php

ob_start();

require __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(url(), ":");

$route->namespace("Source\App");

// USERS
// get dos dados do usuário --
$route->get("/user","Api:getUser");

// put atualiza os dados do usuario --
$route->put("/user/name/{name}/email/{email}/surname/{surname}","Api:updateUser");

// post cadastrar um usuario --
$route->post("/user/name/{name}/email/{email}/password/{password}", "Api:createUser");

// get das postagens do usuário --
$route->get("/user/works","Api:getWorks");

// put atualiza uma postagem ja existente --
$route->put("/user/id/{id}/title/{title}/info/{info}/idState/{idState}","Api:updateWork");

// post cria uma nova postagem --
$route->post("/user/title/{title}/info/{info}/idCategory/{idCategory}/idState/{idState}", "Api:createWork");

//ADM

// get dos dados do usuário --
$route->get("/user/{idUser}","Api:getUserById");

// get todos os usuarios --
$route->get("/user/users","Api:getUsers");

// get todos as postagens do sistema --
$route->get("/user/posts","Api:getPosts");

// put atualiza os dados de um usuario --
$route->put("/user/name/{name}/surname/{surname}","Api:updateUserByAdm");

// get de uma única postagem --
$route->get("/user/work/{idWork}","Api:getWork");

// put atualiza uma postagem ja existente de um usuario
$route->put("/user/id/{id}/title/{title}/info/{info}","Api:updateWorkByAdm");

$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();