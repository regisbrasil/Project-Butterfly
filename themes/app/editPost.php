<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Butterfly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url("assets/web/"); ?>css/style-forms.css">
    <link rel="shortcut icon" href="<?= url("assets/web/"); ?>img/logo-project.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="register">

        <h1 class="text-center">Atualizar Obra</h1>
        
        <form id="form-update" class="needs-validation" novalidate>
            <div class="form-group">
                <label class="form-label">Título</label>
                <input type="text" name="title" class="form-control" id="title" value="<?= $work->title?>">
            </div>
            <div class="col-sm-6 mt-4">
                <p class="font-weight-bold">Imagem:</p>
                <input class="form-control" type="file" name="image" id="image">
              </div>   
            <div class="form-group mb-3">
                <label class="form-label">Descrição</label>
                <input class="form-control" type="text" id="info" name="info" value="<?=$work->info?>">
            </div>

            <select class="form-select form-select-lg mb-3" name="category" aria-label=".form-select-lg example">
            <option selected>Escolher categoria</option>
            <?php
            if(!empty($categoriesList)){
                foreach ($categoriesList as $category){
                    echo "<option value=\"{$category->id}\">{$category->theme}</option>";
                }
            }
            ?>
            </select>

            <select class="form-select form-select-lg mb-3" name="state" aria-label=".form-select-lg example">
            <option selected>Escolher estado</option>
            <?php
            if(!empty($statesList)){
                foreach ($statesList as $state){
                    echo "<option value=\"{$state->id}\">{$state->option}</option>";
                }
            }
            ?>
            </select>
            <div class="sucess" id="message">
                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
            </div>
			<button class="btn btn-dark w-100 mb-4 mt-2" type="submit" name="send">Enviar</button>
        </form>
    </div>

    <script type="text/javascript" async>
        const form = document.querySelector("#form-update");
        const message = document.querySelector("#message"); // id da div message
        
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            //alert("Oi");
            const dataPost = new FormData(form);
            // enviar para a rota já definida
            const data = await fetch("<?= url("app/editar-postagem/id?id=" . $work->id); ?>",{
                method: "POST",
                body: dataPost,
            });
            const post = await data.json();
            if(post){
                window.location.href = "http://www.localhost/projpwii/app";
            }

        });
    </script>

</body>

</html>