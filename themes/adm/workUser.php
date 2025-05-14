<!DOCTYPE html>
<html lang="pt-br">

<head>
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Butterfly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url("assets/app/"); ?>css/style-profile.css">
    <link rel="shortcut icon" href="<?= url("assets/app/"); ?>img/logo-project.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
<div id="container">	
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center bg-light rounded">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= url($work->image); ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?= $work->title ?></h1>
                        <div class="fs-5 mb-5">
                        <button type="button" class="btn btn-outline-secondary fs-4" disabled>Preço</button>
                        </div>
                        <p class="lead"><?= $work->info ?></p>
                        <div class="d-grid gap-2 d-md-block">
                            
                            <a class="btn btn-outline-dark flex-shrink-0" type="button" href="<?= url("admin/editar-obra/id?id=" . $work->id)?>">
                                <i class="bi-cart-fill me-1"></i>
                                Editar Obra
                            </a>
                            <?php
            foreach ($states as $state){
            if($state->id == $work->idState) {
            ?>

            <button type="button" class="btn btn-outline-secondary ms-2" disabled><?= $state->option; ?></button>
            <?php
            }
          }
            ?>
            <?php
                        foreach ($categories as $category){
                          if($category->id == $work->idCategory){
                        ?>
            <button type="button" class="btn btn-outline-secondary ms-2" disabled><?=  $category->theme; ?></button>
            <?php
                        }
                      }
                        ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    
</body>
</html>
