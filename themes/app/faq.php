<?php
$this->layout("_theme");
?>

<section>
  <h3 class="text-center mb-4 pb-2 fw-bold mt-5" style="margin-top: 5rem !important;">FAQ</h3>
  <p class="text-center mb-5 fs-3">
    Perguntas frequentes referentes a problemas ou duvídas
  </p>
  <a href="<?= url("app/nova-pergunta"); ?>" class="link-primary fs-4" style="text-decoration: none;"><p class="text-center mb-5">
    Deseja informar alguma duvída ou erro?
  </p></a>



  <div class="row mx-5">
  <?php
        foreach ($faqs as $faq)
        {
    ?>
    <div class="col-md-6 col-lg-4 mb-4">
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