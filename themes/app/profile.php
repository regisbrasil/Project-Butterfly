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

            <?php
              if(!empty($user->getAvatar())):
            ?>
            
                <img src="<?= url($user->getAvatar()); ?>" id="avatarShow" class="rounded mx-auto d-block mt-5" style="height: 200px;"> 
            <?php
            else:
            ?>
              <img src="<?= url("assets/app/img/profile.jpeg"); ?>" id="avatarShow" class="rounded mx-auto d-block mt-5" style="height: 200px;">
            <?php
            endif;
            ?>
            <h2 class="font-weight-bold mt-4"><?=$user->getSurname();?></h2>
              <p class="category-user fs-5">Artista</p>
              <a class="text-dark" href="<?= url("app")?>"><i class="fa-solid fa-arrow-left fa-4x mb-4 hov-text mt-5"></i></a>
            </div>
          </div>
          <div class="col-sm-8 bg-white rounded-right">
            <h3 class="mt-3 text-center">Informações</h3>
            <hr class="badge-primary mt-0 w-25">
            <div class="row">
            <div class="col-sm-6">
                <p class="font-weight-bold">Nome:</p>
                <input class="form-control" type="text" name="name" value="<?=$user->getName();?>" id="name">
              </div>
              <div class="col-sm-6">
                <p class="font-weight-bold">Apelido:</p>
                <input class="form-control" type="text" name="surname" value="<?= $user->getSurname();?>" id="surname">
              </div>  
              <div class="col-sm-6 mt-4">
                <p class="font-weight-bold">Email:</p>
                <input class="form-control" type="email" name="email" value="<?=$user->getEmail();?>" id="email">
              </div>
              <div class="col-sm-6 mt-4">
                <p class="font-weight-bold">Senha:</p>
                <input class="form-control" type="password" name="password" value="12345678">
              </div>
              <div class="col-sm-6 mt-4">
                <p class="font-weight-bold">Avatar:</p>
                <input class="form-control" type="file" name="avatar" id="avatar">
              </div>              
            </div>
            <h4 class="mt-4">Endereço:</h4>
            <hr class="bg-primary">
            <div class="row">
              <div class="col-sm-6 mt-2">
                  <p class="font-weight-bold">País:</p>
                  <input class="form-control" type="name" name="country" value="Brasil">
                </div>
                <div class="col-sm-6 mt-2">
                  <p class="font-weight-bold">CEP:</p>
                  <input class="form-control" type="number" name="cep" value="9583483">
                </div>
                <div class="col-sm-6 mt-4">
                  <p class="font-weight-bold">Rua:</p>
                  <input class="form-control" type="name" name="street" value="Rua A">
                </div>
                <div class="col-sm-6 mt-4">
                  <p class="font-weight-bold">Numero:</p>
                  <input class="form-control" type="number" name="number" value="2004">
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mt-3">
              <button class="btn btn-dark" type="submit" name="send" >Salvar Alterações</button>
            </div>
            <div class="alert alert-primary" style="display: none" role="alert" id="message">
            Mensagem de Retorno!
        </div>
            <hr class="bg-primary">
            <ul class="list-unstyled d-flex justify-content-center mt-4">
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
  
  <script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    const message = document.querySelector("#message");
    const avatarShow = document.querySelector("#avatarShow");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("app/perfil"); ?>",{
            method: "POST",
            body: dataUser,
        });
        console.log(data);
        const user = await data.json();
        console.log(user);
        if(user) {
            if(user.type === "alert-success" && user.avatar != null) {
                avatarShow.setAttribute("src",user.avatar);
            }
            message.setAttribute("style","display");
            message.textContent = user.message;
            message.classList.remove("alert-primary", "alert-danger");
            message.classList.add(`${user.type}`);
            setTimeout(() => {
                message.setAttribute("style","display: none")
            },3000);
        }
    });
</script>

</body>
</html>
