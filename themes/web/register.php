<?php
$this->layout("_theme",["categories" => $categories]);
?>

    <div class="register mt-5">

        <h1 class="text-center">Cadastrar</h1>
        
        <form id="form-register-user" class="needs-validation" novalidate>
            <div class="form-group">
                <label class="form-label" for="name">Nome Completo</label>
                <input type="text" name="name" value="" class="form-control" id="name">
            </div>
            <!-- <div class="form-group mb-3">
                <label class="form-label" for="dtBorn">Data de nascimento</label>
                <input class="form-control" type="date" id="dtBorn">
            </div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Artista</option>
                <option value="1">Marchand</option>
            </select> -->
            <div class="form-group">
                <label class="form-label" for="email">Endereço de email</label>
                <input type="email" name="email" value="" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Senha</label>
                <input type="password" name="password" value="" class="form-control" id="password">
            </div>
            <div class="sucess" id="message">
                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
            </div>
			<button class="btn btn-dark w-100 mb-4" type="submit">Criar Conta</button>
			<p>Já possui uma conta? <a class=" link-dark" href="<?= url()?>">Entre agora</a></p>
        </form>
    </div>

    <script type="text/javascript" async>
        const form = document.querySelector("#form-register-user"); // id do formulário
        const message = document.querySelector("#message"); // id da div message
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const dataUser = new FormData(form);
            // enviar para a rota já definida
            const data = await fetch("<?= url("cadastrar"); ?>",{
                method: "POST",
                body: dataUser,
            });
            const user = await data.json();
                console.log(user);

            // tratamento da mensagem
            
            if(user) {
                message.innerHTML = user.message;
                message.classList.add("message");
                message.classList.add(`${user.type}`);
            }
        });
    </script>