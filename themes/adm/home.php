<?php

$this->layout("_theme",["categories" => $categories]);

?>


  
  <div class="col-11 m-auto row row-cols-1 row-cols-md-3 g-4 mt-5">
    
    <?php
        foreach ($works as $work)
        {
    ?>

  <div class="col">
      <div class="card">
      <div class="card-body pb-2 mx-auto">                
        <div class="form-check form-check-inline">
        <!-- Button trigger modal -->
          <a class="btn btn-dark ps-4 pe-4" href="<?= url("admin/editar-obra/id?id=" . $work["id"])?>">
            <i class="fa-solid fa-pencil"></i>
          </a>
            
        </div>
        <div class="form-check form-check-inline">
 
          <h5 class="mb-0 me-5"><?= $work["author"]->name ?></h5>

        </div>
        <div class="form-check form-check-inline">

          <button class="btn btn-dark ps-4 pe-4" type="button" data-bs-toggle="modal" data-bs-target="#delete">
            <i class="fa-solid fa-trash"></i>
          </button>
          <!-- Modal -->
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
        </div>
      </div>
        <div class="card-img-adjust mt-0">
          <img src="<?= url($work["image"]); ?>" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-title"><?= $work["title"]; ?></h5>
          <div class="d-grid gap-2 d-md-block">
            <?php
            foreach ($states as $state){
            if($state->id == $work["idState"]) {
            ?>

            <button type="button" class="btn btn-outline-secondary" disabled><?= $state->option; ?></button>
            <?php
            }
          }
            ?>
            <?php
                        foreach ($categories as $category){
                          if($category->id == $work["idCategory"]){
                        ?>
            <button type="button" class="btn btn-outline-secondary" disabled><?=  $category->theme; ?></button>
            <?php
                        }
                      }
                        ?>
            <button type="button" class="btn btn-outline-secondary" disabled>Preço</button>
            <a class="btn btn-dark ps-4 pe-4 ms-5" type="button" href="<?= url("admin/postagem/id?id=" . $work["id"])?>">
                         <i class="fa-solid fa-circle-info"></i>
          </a>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
    ?>
  </div>
</body>

</html>