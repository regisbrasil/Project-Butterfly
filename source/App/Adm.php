<?php

namespace Source\App;
use League\Plates\Engine;
use Source\Models\Admin;
use Source\Models\Category;
use Source\Models\Faq;
use Source\Models\State;
use Source\Models\User;
use Source\Models\Work;
use Source\Models\WriteWork;

class Adm
{
    private $view;
    private $categories;
    private $states;

    public function __construct()
    {
        if(empty($_SESSION["admin"]) || empty($_COOKIE["admin"])) {
            header("Location:http://www.localhost/projpwii/");
        }

        $categories = new Category();
        $this->categories = $categories->selectAll();

        $states = new State();
        $this->states = $states->selectAll();

        setcookie("admin","Logado",time()+60*60,"/");
        $this->view = new Engine(CONF_VIEW_ADMIN, 'php');
    }

    public function home () : void
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

        $adm = new Admin($_SESSION["admin"]["id"]);
        $adm->findById();

        //var_dump($user);

        echo $this->view->render("profile",[
            "admin" => $adm
        ]);

    }

    public function users() : void
    {
        $user = new User();
        $users = $user->selectAll();

        echo $this->view->render("users",
            [
                "users" => $users
            ]
        );
    }

    public function userEdit()  {

        $user = new User();
        echo $this->view->render("editUser",[
            "user" => $user->getById($_GET["id"])
        ]);
    }

     public function userUpdate(array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe todos os campos!",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User(
                $_GET["id"],
                $data["name"],
                null,
                null,
                null,
                $data["surname"]
            );
            var_dump($user);
            $user->updateMadeAdm();

            $json = [
                "message" => $user->getMessage(),
                "type" => "alert-success",
                "name" => $user->getName()
            ];
            echo json_encode($json);
        }
    }

    public function postsByUser() : void
    {
        $work = new Work();
        $user = new User();

        $works = $work->findByidUser(intval($_GET["id"]));

        // var_dump();
        echo $this->view->render(
            "worksByUser",[
                "categories" => $this->categories,
                "works" => $works,
                "states" => $this->states
            ]
        );
    }

    public function profileByUser()
    {
        $user = new User();

        echo $this->view->render(
            "profileUser",[
                "categories" => $this->categories,
                "user" => $user->getById($_GET["id"]),
                "states" => $this->states
            ]
        );
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
    
    public function workEdit()
    {
        $work = new Work();
        echo $this->view->render("editWork",[
            "work" => $work->getById($_GET["id"])
        ]);
    }

    public function workUpdate(array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe todos os campos!",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }

            $work = new Work(
                $_GET["id"],
                $data["title"],
                null,
                $data["info"],
                null,
                null
            );
            $work->updateMadeAdm();

            $json = [
                "message" => $work->getMessage(),
                "type" => "alert-success",
                "title" => $work->getTitle(),
                "info" => $work->getInfo()
            ];
            echo json_encode($json);
        }
    }

    public function posts() : void
    {
        $work = new Work();
        $works = $work->selectAll();

        echo $this->view->render("posts",
            [
                "categories" => $this->categories,
                "works" => $works
            ]
        );
    }

    public function faqs()
    {
        $faq = new Faq();
        $faqs = $faq->selectAll();

        echo $this->view->render("faqs",
            [
                "faqs" => $faqs
            ]
        );
    }

    public function faqEdit()  {

        $faq = new Faq();
        echo $this->view->render("editFaq",[
            "faq" => $faq->getById($_GET["id"])
        ]);
    }
    

    public function faqRegister(array $data) : void
    {
        if(!empty($data)){
            if(in_array("",$data)){
                $response = [
                    "type" => "danger",
                    "message" => "Preencha todos os campos"
                ];
                echo json_encode($response);
                return;
            }

            $faq = new Faq(
                null,
                $data["question"],
                $data["answer"]
            );
            $faq->insert();
            $response = [
                "type" => "success",
                "message" => $faq->getMessage()
            ];
            echo json_encode($response);
            return;
        }
        echo $this->view->render("registerFaq");
    }

    public function faqUpdate(array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe todos os campos!",
                    "type" => "alert-danger"
                ];
                echo json_encode($json);
                return;
            }

            $faq = new Faq(
                $_GET["id"],
                $data["question"],
                $data["answer"]
            );
            $faq->update();

            $json = [
                "message" => $faq->getMessage(),
                "type" => "alert-success",
                "question" => $faq->getQuestion(),
                "answer" => $faq->getAnswer()
            ];
            echo json_encode($json);
        }
    }

    public function logout()
    {
        session_destroy();
        setcookie("admin","Logado",time() - 3600,"/");
        header("Location:http://www.localhost/projpwii/");
    }

}