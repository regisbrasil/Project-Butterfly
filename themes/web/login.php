<?php
$this->layout("_theme");
?>

    <div class="login mt-5">

        <h1 class="text-center">Login</h1>
        
        <form id="form-login-user" class="needs-validation">
            <div class="form-group was-validated">
                <label class="form-label" for="email">Endereço de Email</label>
                <input class="form-control" type="email" name="email" value="" id="email" required>
                <div class="invalid-feedback">
                    Por favor, insira seu email
                </div>
            </div>
            <div class="form-group was-validated">
                <label class="form-label" for="password">Senha</label>
                <input class="form-control" type="password" name="password" value="" id="password" required>
                <div class="invalid-feedback">
                    Por favor, insira sua senha
                </div>
            </div>
            <div class="sucess" id="message">
                <!-- Aqui aparece a mensagem, caso ocorra erro! -->
            </div>
            <button class="btn btn-dark w-100 mb-4" type="submit">Entrar</button>
			<p>Não possui uma conta? <a class=" link-dark" href="cadastrar">Crie uma Agora</a></p>
        </form>

    </div>
    <script type="text/javascript" async>
        const form = document.querySelector("#form-login-user");
        const message = document.querySelector("#message");
            form.addEventListener("submit", async (e) => {
                e.preventDefault();
            const dataUser = new FormData(form);
            const data = await fetch("<?= url("login"); ?>",{
                method: "POST",
                body: dataUser,
            });
            console.log(data);
            const user = await data.json();
            console.log(user);
            if(user.type == "success") {
                window.location.href = "<?= url("app"); ?>";
            }else if (user.type == "admin") {
                window.location.href = "<?= url("admin"); ?>";
            }

            });
        </script>


