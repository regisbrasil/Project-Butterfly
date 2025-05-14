
<!-- _theme.php: Tudo que é comum no layout. Exemplo: head, nav, section "content", hoot -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Butterfly</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= url("assets/app/"); ?>css/style.css">
  <link rel="shortcut icon" href="<?= url("assets/app/"); ?>img/logo-project.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <nav class="navbar col-12 m-auto navbar-dark bg-dark fixed-top">
    <div class="container-fluid col-11 m-auto">
      <a class="navbar-brand" href="#">
        
      <!-- Foto do usuario -->
      
        Project Butterfly</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Buscar</button>
          </form> -->
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= url("app")?>">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Meu espaço
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="<?= url("app/perfil"); ?>">Perfil</a></li>
                <li><a class="dropdown-item" href="<?= url("app/post"); ?>">Nova Postagem</a></li>
                <li><a class="dropdown-item" href="<?= url("app/minhas-postagens"); ?>">Minhas Postagens</a></li>
                <li><a class="dropdown-item" href="<?= url("app/comprados"); ?>">Comprados</a></li>
                <li><a class="dropdown-item" href="<?= url("app/favoritos"); ?>">Favoritados</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= url("app/sobre"); ?>">Sobre</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
              <?php
                        foreach ($categories as $category){
                        ?>
                        <li>
                          <a class="dropdown-item" href="<?= url("app/trabalhos/{$category->id}"); ?>">
                          <?= $category->theme; ?></a>
                        </li>
                        <?php
                        }
                        ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= url("app/faq"); ?>">Faq</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= url("app/sair"); ?>">Sair da conta</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
   

  <?php echo $this->section("content");?>
  

  <footer class="bg-dark text-white pt-5 pb-4 mt-5">

    <div class="container text-center text-md-left">

      <div class="row text-center text-md-left">

        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold" style="color:#a5a5a5;">Project Butterfly</h5>
          <p>Aproveite nosso site, há muitas obras a se explorar por aqui. Nossa empresa esta trabalhando bastante para ajudar nossos usuarios com problemas que vem ocorrendo. Se tiver alguma duvida nos contate.</p>
        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold" style="color:#a5a5a5;">Programação</h5>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Regis Brasil</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Fé</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">em</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">Deus</a>
          </p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-wight-bold" style="color:#a5a5a5;">Links úteis</h5>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">apnp.ifsul.edu.br</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">wall.alphacoders.com</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">getbootstrap.com</a>
          </p>
          <p>
            <a href="#" class="text-white" style="text-decoration: none;">dribbble.com</a>
          </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold" style="color:#a5a5a5;">Contatos</h5>
          <p>
            <i class="fas fa-home me-2"></i>Charqueadas, RS 123, BR
          </p>
          <p>
            <i class="fas fa-envelope mr-3 me-2"></i>regisbrasil@gmail.com
          </p>
          <p>
            <i class="fas fa-phone mr-3 me-2"></i>+55 51 99588-7289
          </p>
        </div>
        <hr class="mb-4">

        <div class="col-md-7 col-lg-8">
          <p>Copyright @2022 All rights reserved by:
            <a href="#" style="text-decoration: none;">
              <strong style="color: #686868;">Regis Bernardo Anhaia Brasil</strong>
            </a>
          </p>
        </div>

        <div class="col-md-5 col-lg-4">
          <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-instagram"></i> </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-linkedin-in"></i> </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white"><i class="fab fa-github"></i> </a>
              </li>
            </ul>

          </div>
        </div>

       </div>
      </div>


      
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>

</body>
</html>