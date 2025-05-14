<!DOCTYPE html>
<html lang="pt-br">

<head>
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Butterfly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url("assets/app/"); ?>css/style-profile.css">
    <link rel="shortcut icon" href="<?= url("assets/web/"); ?>img/logo-project.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 mt-5 mb-5">
        <form enctype="multipart/form-data" method="post" id="formProfile" class="row z-depth-3">
          <div class="col-sm-4 bg-secondary rounded-left">
            <div class="card-body text-center text-black">

              <img src="<?= url("assets/app/img/profile.jpeg"); ?>" id="avatarShow" class="rounded mx-auto d-block mt-5" style="height: 200px;">
 
            <h2 class="font-weight-bold mt-4">Administrador</h2>
              <p class="category-user fs-5">Admin</p>
              <a class="text-dark" href="<?= url("admin")?>"><i class="fa-solid fa-arrow-left fa-4x mb-4 hov-text mt-5"></i></a>
            </div>
          </div>
          <div class="col-sm-8 bg-white rounded-right">
            <h3 class="mt-3 text-center">Informações</h3>
            <hr class="badge-primary mt-0 w-25">
            <div class="row mt-5">
            <div class="col-sm-6">
                <p class="font-weight-bold">Nome:</p>
                <input class="form-control" type="text" name="name" value="<?=$admin->getName();?>" id="name" disabled>
              </div>               
              <div class="col-sm-6">
                <p class="font-weight-bold">Email:</p>
                <input class="form-control" type="email" name="email" value="<?=$admin->getEmail();?>" id="email" disabled>
              </div>
            </div>
            <hr class="bg-primary mt-5">
            <ul class="list-unstyled d-flex justify-content-center mt-5">
              <li>
                <a href="#"><i class="fab fa-facebook-f px-3 h4 text-info text-dark"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-youtube px-3 h4 text-info text-dark"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-twitter px-3 h4 text-info text-dark"></i></a>
              </li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
