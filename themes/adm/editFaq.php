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

        <h1 class="text-center">Editar Faq</h1>
        
        <form id="form-edit-faq" class="needs-validation" novalidate>
            <div class="form-group">
                <label class="form-label">Pergunta:</label>
                <input type="text" name="question" class="form-control" id="question" value="<?=$faq->question?>">
            </div>
            <div class="form-group">
                <label class="form-label">Resposta:</label>
                <input class="form-control" type="text" name="answer" id="answer" value="<?=$faq->answer;?>">
              </div>   
            <div class="sucess" id="message">
                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
            </div>
			<button class="btn btn-dark w-100 mb-4 mt-2" type="submit" name="send">Enviar</button>
        </form>
    </div>

    <script type="text/javascript" async>
    const form = document.querySelector("#form-edit-faq");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataFaq = new FormData(form);
        const data = await fetch("<?= url("admin/editar-faq/id?id=" . $faq->id); ?>",{
            method: "POST",
            body: dataFaq,
        });
        // console.log(data);
        const faq = await data.json();
        console.log(faq);
        if(faq){
                window.location.href = "http://www.localhost/projpwii/admin/faqs";
            }
    });
</script>
</body>

</html>