<?php

namespace Source\App;

use Source\Models\Category;
use League\Plates\Engine;
use Source\Models\State;
use Source\Models\Work;
use Source\Models\Faq;
use Source\Models\User;
use Source\Models\WriteWork;

class App
{
    private $view;
    private $categories;
    private $states;

    public function __construct()
    {
        if(empty($_SESSION["user"]) || empty($_COOKIE["user"])){
            header("Location:http://www.localhost/projpwii/");
        }

        $categories = new Category();
        $this->categories = $categories->selectAll();

        $states = new State();
        $this->states = $states->selectAll();

        setcookie("user","Logado",time()+60*60,"/");
        $this->view = new Engine(CONF_VIEW_APP,'php');
    }
    
    public function home() : void
    {
        $work = new Work();
        $author = new User();
        $works = $work->selectAll();

        $worksWithAuthors = [];

        foreach ($works as $i => $workWithAutor) {
            $worksWithAuthors[$i] = [
                "id" => $workWithAutor->id,
                "title" => $workWithAutor->title,
                "image" => $workWithAutor->image,
                "info" => $workWithAutor->info,
                "idState" => $workWithAutor->idState,
                "idCategory" => $workWithAutor->idCategory,
                "author" => $author->getById($work->findUserByIdWork($workWithAutor->id)[0]->idUser)
            ];
        }

        echo $this->view->render("home",
            [
                "categories" => $this->categories,
                "works" => $worksWithAuthors,
                "states" => $this->states
            ]
        );
    }

    public function profile(array $data) : void
    {

        // buscar as informações do usuário da SESSION.
        // $user = $_SESSION["user"];
        // buscar as informações do usuário no BD
        $user = new User($_SESSION["user"]["id"]);
        $user->findById();

        //var_dump($user);

        echo $this->view->render("profile",[
            "user" => $user
        ]);

    }

    public function logout()
    {
        session_destroy();
        setcookie("user","Logado",time() - 3600,"/");
        header("Location:http://www.localhost/projpwii/");
    }

    public function about() : void
    {
        echo $this->view->render(
            "about",[
                "categories" => $this->categories
            ]
        );
    }

    public function newQuestion(array $data) : void
    {
        if(!empty($data)){
            if(in_array("",$data)){
                $response = [
                    "type" => "danger",
                    "message" => "Preencha o campo!"
                ];
                echo json_encode($response);
                return;
            }

            $faq = new Faq(
                null,
                $data["question"],
                null
            );
            $faq->insertQuestion();
            $response = [
                "type" => "success",
                "message" => $faq->getMessage()
            ];
            echo json_encode($response);
            return;
        }
        echo $this->view->render("faqQuestion");
    }

    public function workUser()
    {
        $work = new Work();

        echo $this->view->render("workUser",[
            "work" => $work->getById($_GET["id"]),
            "categories" => $this->categories,
            "states" => $this->states
        ]);
    }

    public function profileUpdate(array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $userJson = [
                    "message" => "Informe todos os campos!",
                    "type" => "alert-danger"
                ];
                echo json_encode($userJson);
                return;
            }
            if(!is_email($data["email"])){
                $json = [
                    "message" => "Informe um e-mail válido...",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }
            // se a imagem for alterada, manda a do formulário $_FILES
            if(!empty($_FILES['avatar']['tmp_name'])) {
                $upload = uploadImage($_FILES['avatar']);
                //unlink($_SESSION["user"]["avatar"]);
            } 
            else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
                $upload = $_SESSION["user"]["avatar"] ? : NULL;
            }

            $user = new User(
                $_SESSION["user"]["id"],
                $data["name"],
                $data["email"],
                null,
                $upload,
                $data["surname"]
            );
            $user->update();

            $userJson = [
                "message" => $user->getMessage(),
                "type" => "alert-success",
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "avatar" => $user->getAvatar() ? url($user->getAvatar()) : NULL
            ];
            echo json_encode($userJson);
        }
    }

    public function buyers() : void
    {
        echo $this->view->render("buyers");

    }

    public function favorites() : void
    {
        echo $this->view->render("favorites");

    }

    public function registerPost(?array $data) : void
    {
        $categories = new Category();
        $categoriesList = $categories->selectAll();

        $states = new State();
        $statesList = $states->selectAll();

        if(!empty($data)){
            $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if(!empty($_FILES['image']['tmp_name'])) {
                $upload = uploadImage($_FILES['image']);
                //unlink($_SESSION["user"]["image"]);
            } 
            // else {
                // se não houve alteração da imagem, manda a imagem que está na sessão
            //     $upload = $_SESSION["work"];
            // }

            $work = new Work(
                null,
                $data["title"],
                $upload,
                $data["info"],
                $data["state"],
                $data["category"],
            );

            $work->insert();

                $writeWork = new WriteWork(
                NULL,
                $work->getId(),
                $_SESSION["user"]["id"]
            );

            $writeWork->writeWorkInsert();

            $json = [
                "message" => "Funcionou!!!",
                "type" => "",
                "title" => $data["title"],
                "image" => $upload,
                "info" => $data["info"],
                "state" => $data["state"],
                "category" => $data["category"]
                
            ];

            echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo $this->view->render("registerPost",[
            "categoriesList" => $categoriesList,
            "statesList" => $statesList
        ]);

    }

    public function postEdit()
    {
        $categories = new Category();
        $categoriesList = $categories->selectAll();

        $states = new State();
        $statesList = $states->selectAll();

        $work = new Work();
        echo $this->view->render("editPost",[
            "work" => $work->getById($_GET["id"]),
            "categoriesList" => $categoriesList,
            "statesList" => $statesList
        ]);

    }

    // public function postUpdate(array $data) : void
    // {
    //     $categories = new Category();
    //     $categoriesList = $categories->selectAll();

    //     $states = new State();
    //     $statesList = $states->selectAll();

    //     if(!empty($data)){

    //         if(in_array("",$data)){
    //             $json = [
    //                 "message" => "Informe todos os campos!",
    //                 "type" => "alert-danger"
    //             ];
    //             echo json_encode($json);
    //             return;
    //         }

    //         if(!empty($data)){
    //             $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    //             if(!empty($_FILES['image']['tmp_name'])) {
    //                 $upload = uploadImage($_FILES['image']);
    //                 //unlink($_SESSION["user"]["image"]);
    //             }
    
    //             $work = new Work(
    //                 null,
    //                 $data["title"],
    //                 $upload,
    //                 $data["info"],
    //                 $data["state"],
    //                 $data["category"],
    //             );
    
    //             $work->update();
    
    //             $json = [
    //                 "message" => "Funcionou!!!",
    //                 "type" => "",
    //                 "title" => $data["title"],
    //                 "image" => $upload,
    //                 "info" => $data["info"],
    //                 "state" => $data["state"],
    //                 "category" => $data["category"]
                    
    //             ];
    
    //             echo json_encode($json);
    //             return;
    //         }
    
    //         echo $this->view->render("editPost",[
    //             "categoriesList" => $categoriesList,
    //             "statesList" => $statesList
    //         ]);
    //     }
    // }


    public function works(?array $data) : void
    {
        if(!empty($data)){
            $work = new Work();
            $works = $work->findByCategory($data["idCategory"]);
        }
        echo $this->view->render(
            "works",[
                "categories" => $this->categories,
                "works" => $works,
                "states" => $this->states
            ]
        );
    }

    public function worksByUser() : void
    {
      
            $work = new Work();
            $works = $work->findByidUser($_SESSION["user"]["id"]);
            
        
        echo $this->view->render(
            "worksByUser",[
                "categories" => $this->categories,
                "works" => $works,
                "states" => $this->states
            ]
        );
    }

    public function faq()
    {
        $faq = new Faq();
        $faqs = $faq->selectAll();

        echo $this->view->render("faq",
            [
                "categories" => $this->categories,
                "faqs" => $faqs
            ]
        );
    }

    public function error(array $data) : void
    {
        echo $this->view->render("404", [
            "categories" => $this->categories,
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }
}

?>