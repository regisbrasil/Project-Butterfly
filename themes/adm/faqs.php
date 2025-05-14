<?php
$this->layout("_theme");
?>

<section>
  <h3 class="text-center mb-4 pb-2 fw-bold mt-5" style="margin-top: 5rem !important;">FAQ</h3>
  <p class="text-center mb-5">
    Perguntas frequentes referentes a problemas ou duvídas
  </p>



  <div class="row mx-5">
  <?php
        foreach ($faqs as $faq)
        {
    ?>
    <div class="col-md-6 col-lg-4 mb-4">
    <div class="form-check form-check-inline">
    <a href="" type="button" data-bs-toggle="modal" data-bs-target="#delete">
    <i class="fa-solid fa-trash text-danger"></i>
    </a>
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
    <div class="form-check form-check-inline">
    <a href="<?= url("admin/editar-faq/id?id=" . $faq->id)?>">
      <i class="fa-solid fa-pencil text-primary"></i>
    </a>
 
    </div>
    <div class="form-check form-check-inline">
         <h6 class="mb-3 fs-5 fw-bold"><?= $faq->question; ?></h6>
        </div>
    

      
      <p class="fs-5">
      <?= $faq->answer; ?>
      </p>
    </div>
    <?php
        }
    ?>

  </div>
</section>
<!--Section: FAQ-->