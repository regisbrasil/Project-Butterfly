<?php
$this->layout("_theme",["categories" => $categories]);
?>

<div class="container mt-about"> 
    <h1 class="text-dark mb-5">Minhas Obras</h1>
</div>
<div class="col-11 m-auto row row-cols-1 row-cols-md-3 g-4 mt-1">
      
    
      <?php
          foreach ($works as $work)
          {
      ?>
  
    <div class="col">
        <div class="card">
        <div class="card-body pb-2">                
          <div class="form-check form-check-inline">
            <h5 class="mb-0 me-5">Sua postagem</h5>
          </div>
          <div class="form-check form-check-inline">
          </div>
        </div>
          <div class="card-img-adjust mt-0">
            <img src="<?= url($work->image); ?>" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $work->title; ?></h5>
            <div class="d-grid gap-2 d-md-block">
              <a class="btn btn-dark" type="button"href="<?= url("app/editar-postagem/id?id=" . $work->id)?>">Editar</a>
              <a class="btn btn-dark" type="button">Excluir</a>
              <?php
              foreach ($states as $state){
              if($state->id == $work->idState) {
              ?>
  
              <button type="button" class="btn btn-outline-secondary" disabled><?= $state->option; ?></button>
              <?php
              }
            }
              ?>
              <?php
                          foreach ($categories as $category){
                            if($category->id == $work->idCategory){
                          ?>
              <button type="button" class="btn btn-outline-secondary" disabled><?=  $category->theme; ?></button>
              <?php
                          }
                        }
                          ?>

              <!-- <button type="button" class="btn btn-outline-secondary" disabled>Preço</button> -->
            </div>
          </div>
        </div>
      </div>
      <?php
          }
      ?>
    </div>