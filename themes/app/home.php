<?php

$this->layout("_theme",["categories" => $categories]);

?>

  <div id="carouselExampleCaptions" class="col-11 m-auto carousel slide mt-5 mb-0" data-bs-ride="carousel"  style="margin-top:4rem !important">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= url("assets/web/"); ?>img/mont.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ascensão em Londres</h5>
          <p>Londres esta em busca de novas personalidades artisticas.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= url("assets/web/"); ?>img/teste.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Charlie Chaplin</h5>
          <p>ator, comediante, diretor, compositor, roteirista, cineasta, editor e músico britânico.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= url("assets/web/"); ?>img/london.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Fotografias</h5>
          <p>Locais no Rio Grande do sul estão atrás de fotográfos amadores.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
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
        <h5 class="mb-0 me-5"><?= $work["author"]->name ?></h5>

        </div>
        <div class="form-check form-check-inline">
        </div>
      </div>
        <div class="card-img-adjust mt-0">
          <img src="<?= url($work["image"]); ?>" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
          <h5 class="card-title"><?= $work["title"]; ?></h5>
          <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-dark" type="button">Favoritar</a>
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
                         <a class="btn btn-dark ps-4 pe-4 ms-5" type="button" href="<?= url("app/postagem/id?id=" . $work["id"])?>">
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
</body>

</html>