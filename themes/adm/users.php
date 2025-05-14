<?php
$this->layout("_theme");
?>

<div class="container mt-about"> 
    <h1 class="text-dark mb-5">Lista de Usuários</h1>
</div>

<div class="col-11 m-auto row row-cols-1 row-cols-md-3 g-4 mt-1">
      
    
      <?php
          foreach ($users as $user)
          {
      ?>
  
    <div class="col">
        <div class="card">
        <div class="card-body pb-2">                
          <div class="form-check form-check-inline">
          <i class="fa-solid fa-user"></i>

          </div>
          <div class="form-check form-check-inline">
          <h5 class="mb-0 me-5 fs-4 text-info"><?= $user->surname; ?></h5>
          </div>
        </div>
          <div class="card-body">
            <h5 class="card-title bg-dark text-white px-1 py-2 text-center mb-4"><?= $user->name; ?></h5>
            <div class="d-grid gap-2 d-md-block">
              <a class="btn btn-dark" type="button" href="<?= url("admin/editar-usuario/id?id=" . $user->id)?>">Editar</a>
  
              <a type="button" class="btn btn-outline-secondary" href="<?= url("admin/postagens-do-usuario/id?id=" . $user->id); ?>">
                Suas Postagens
              </a>         
              <a class="btn btn-dark ps-4 pe-4 ms-5" type="button" href="<?= url("admin/perfil-do-usuario/id?id=" . $user->id); ?>">
              <i class="fa-solid fa-circle-info"></i>
            </a>
              <!-- <button type="button" class="btn btn-outline-secondary" disabled>Preço</button> -->
            </div>
          </div>
        </div>
      </div>
      <?php
          }
      ?>
    </div>