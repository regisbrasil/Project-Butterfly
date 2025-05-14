<?php

namespace Source\App;

use Source\Models\User;
use Source\Models\Work;
use Source\Models\WriteWork;

class Api
{
    private $user;
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $headers = getallheaders();
        $this->user = new User();

        // $this->work = new Work();        

        if($headers["Rule"] === "N"){
            return;
        }
        if(empty($headers["Email"]) || empty($headers["Password"]) || empty($headers["Rule"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "Informe E-mail e Senha para acessar"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        if(!$this->user->validate($headers["Email"],$headers["Password"])){
            $response = [
                "code" => 401,
                "type" => "unauthorized",
                "message" => $this->user->getMessage()
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
    }

    public function getUser()
    {
        // Só mostra quando encontrar
        if($this->user->getId() != null){
            echo json_encode($this->user->getArray(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getUserById(array $data) : void
    {
        if(!empty($data)){
            $user = new User($data["idUser"]);

            if(!$user->findById()){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Usuário não cadastradao"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Usuário encontrada com sucesso pelo Admin",
                "user" => [
                    "dados" => $user->getArray()
                ]
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getUsers()
    {
        // Só mostra quando encontrar
        if($this->user->getId() != null){
            echo json_encode($this->user->selectAll(),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getPosts()
    {
        // Só mostra quando encontrar
        if($this->user->getId() != null){
            $works = new Work();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Postagens encontrados com sucesso",
                "projects" => $works->selectAll()
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getWorks()
    {
        if($this->user->getId() != null){
            $works = new Work();

            if(!$works->findByidUser($this->user->getId())){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Autor não tem projetos cadastrados"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Projetos encontrados com sucesso",
                "projects" => $works->findByidUser($this->user->getId())
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function getWork(array $data) : void
    {
        if(!empty($data)){
            $work = new Work($data["idWork"]);

            if(!$work->findByid()){
                $response = [
                    "code" => 400,
                    "type" => "bad_request",
                    "message" => "Obra não cadastrada"
                ];
                echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Obra encontrada com sucesso",
                "project" => [
                    "id" => $work->getId(),
                    "title" => $work->getTitle(),
                    "abstract" => $work->getInfo(),
                ]
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateUser(array $data) : void
    {
        if($this->user->getId() != null){
            $this->user->setName($data["name"]);
            $this->user->setEmail($data["email"]);
            $this->user->setSurname($data["surname"]);
            $this->user->update();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Usuário alterado com sucesso!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateUserByAdm(array $data) : void
    {
        if($this->user->getId() != null){
            $this->user->setName($data["name"]);
            $this->user->setEmail($data["email"]);
            $this->user->setSurname($data["surname"]);
            $this->user->updateMadeAdm();
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Usuário alterado com sucesso pelo Admin"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateWorkByAdm(array $data) : void
    {
        $work = new Work();
        $work->setId($data["id"]);
        $work->setTitle($data["title"]);
        $work->setInfo($data["info"]);
        $work->updateMadeAdm();
        $response = [
            "code" => 200,
            "message" => "Obra alterada com sucesso pelo Admin",
            "type" => "success"
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function createUser(array $data)
    {

        if($this->user->findByEmail($data["email"])){
            $response = [
                "code" => 400,
                "type" => "bad_request",
                "message" => "E-mail já cadastrado"
            ];
            echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        $this->user->setName($data["name"]);
        $this->user->setEmail($data["email"]);
        $this->user->setPassword($data["password"]);
        $this->user->insert();
        
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Usuário cadastrado com sucesso"
        ];
        echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    
    public function updateWork(array $data) : void
    {
        $work = new Work();
        $work->setId($data["id"]);
        $work->setTitle($data["title"]);
        $work->setInfo($data["info"]);
        $work->setIdState($data["idState"]);
        $work->update();
        $response = [
            "code" => 200,
            "message" => "Obra alterada com sucesso",
            "type" => "success"
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function createWork(array $data)
    {
        $work = new Work();
        $work->setTitle($data["title"]);
        $work->setInfo($data["info"]);
        $work->setIdCategory($data["idCategory"]);
        $work->setIdState($data["idState"]);
        $work->insert();
        $writeWork = new WriteWork(
            NULL,
            $work->getId(),
            $_SESSION["user"]["id"]
        );

        $writeWork->writeWorkInsert();
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Obra postada com sucesso"
        ];
        echo json_encode($response,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}