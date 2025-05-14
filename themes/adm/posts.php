<?php

$this->layout("_theme",["categories" => $categories]);

?>

<div class="container mt-about"> 
    <h1 class="text-dark mb-5">Lista de Postagens</h1>
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
          <i class="fa-solid fa-user"></i>

          </div>
          <div class="form-check form-check-inline">
          <h5 class="mb-0 me-5 fs-4 text-info"><?= $work->title; ?></h5>
          </div>
        </div>
          <div class="card-body">
            
          <?php
              foreach ($categories as $category){
                if($category->id == $work->idCategory){
          ?>
            <h5 class="card-title bg-dark text-white px-1 py-2 text-center mb-4"><?= $category->theme; ?></h5>
            <?php
                        }
                      }
                        ?>
            <div class="d-grid gap-2 d-md-block">
              <a class="btn btn-dark" type="button" href="<?= url("admin/editar-obra/id?id=" . $work->id)?>">Editar</a>
              <a class="btn btn-dark" type="button" href="<?= url("admin/editar-obra/id?id=" . $work->id)?>">Excluir</a>
              <a class="btn btn-dark ps-4 pe-4 ms-5 position-absolute end-0 me-4" type="button" href="<?= url("admin/postagem/id?id=" . $work->id)?>">
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


<!-- 
<table class="table col-12" style="margin-top: 6rem;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titúlo</th>
      <th scope="col">Imagem</th>
      <th scope="col">Informação</th>
      <th scope="col">Estado</th>
      <th scope="col">Categoria</th>
      <th scope="col">Ferramentas</th>
    </tr>
  </thead>
  <tbody>
  <php
        foreach ($works as $work)
        {
    ?>
    <tr>
      <th scope="row"><= $work->id; ?></th>
      <td>?= $work->title; ?></td>
      <td>?= $work->image; ?></td>
      <td>?= $work->info; ?></td>
      <td>?= $work->idState; ?></td>
      <td>?= $work->idCategory; ?></td>
      <td>
        
      <a type="button" class="mx-2" href="<= url("admin/editar-obra/id?id=" . $work->id)?>">
        <i class="fa-solid fa-pencil"></i>
        </a>

        <a class="ms-3" type="button" data-bs-toggle="modal" data-bs-target="#delete">
        <i class="fa-solid fa-trash text-danger"></i>
        </a>
        
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deseja excluir este item?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary">Sim</button>
      </div>
    </div>
  </div>
</div>
    </td>
    </tr>
    
    <php
        }
    ?>
    
  </tbody>
</table> --> -->