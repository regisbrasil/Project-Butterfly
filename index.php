<?php

session_start();
ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(CONF_URL_BASE, ":");
//$route = new Router('localhost/acme-tarde', ":"); // Route para localhost

/********************************
 * Web Routes                   *
 *******************************/

$route->namespace("Source\App");

$route->get("/sobre","Web:about");

/**
 * Register & Login
 */

$route->get("/","Web:login");
$route->post("/login","Web:login");


$route->get("/cadastrar","Web:register");
$route->post("/cadastrar","Web:register");



/********************************
 * App Routes                   *
 *******************************/

$route->group("/app"); // agrupa em /app

$route->get("/","App:home");
$route->get("/sobre","App:about");

$route->get("/faq","App:faq");

$route->get("/nova-pergunta","App:newQuestion");
$route->post("/nova-pergunta","App:newQuestion");

$route->get("/sair","App:logout");

/**
 * User Routes
 */

$route->get("/perfil","App:profile");
$route->post("/perfil","App:profileUpdate"); // para envio das atualizações

$route->get("/comprados","App:buyers");
$route->get("/favoritos","App:favorites");


/**
 * Register new Art
 */

$route->get("/post","App:registerPost");
$route->post("/post","App:registerPost");

/**
 * Workart Routes
 */

$route->get("/trabalhos/{idCategory}","App:works");
$route->get("/minhas-postagens", "App:worksByUser");

$route->get("/postagem/{idWork}", "App:workUser");

$route->get("/editar-postagem/{idPost}", "App:postEdit");
$route->post("/editar-postagem/{idPost}", "App:postUpdate");


/********************************
 * Admin Routes                   *
 *******************************/

$route->group(null); // desagrupo do /app

$route->group("/admin"); // agrupa em /admin
$route->get("/","Adm:home");

$route->get("/perfil","Adm:profile");

$route->get("/editar-obra/{idWork}","Adm:workEdit");
$route->post("/editar-obra/{idWork}","Adm:workUpdate");

$route->get("/postagem/{idWork}", "Adm:workUser");
$route->get("/postagens-do-usuario/{idUser}", "Adm:postsByUser");

$route->get("/postagens","Adm:posts");
$route->get("/usuarios","Adm:users");
$route->get("/faqs","Adm:faqs");

$route->get("/editar-usuario/{idUser}", "Adm:userEdit");
$route->post("/editar-usuario/{idUser}", "Adm:userUpdate");

$route->get("/perfil-do-usuario/{idUser}", "Adm:profileByUser");

$route->get("/faq-registro","Adm:faqRegister");
$route->post("/faq-registro","Adm:faqRegister");

$route->get("/editar-faq/{idFaq}","Adm:faqEdit");
$route->post("/editar-faq/{idFaq}","Adm:faqUpdate"); // para envio das atualizações

$route->get("/sair","Adm:logout");

 // para envio das atualizações





$route->group(null); // desagrupo do /admin

/*
 * Erros Routes
 */

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "App:error");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();