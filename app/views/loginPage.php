<script src="./assets/js/login.js" defer></script>
<div class="row">
    <div class="col-sm-6 text-black">
        <div class="px-5 my-4 ms-xl-4">
            <i class="fa-solid fa-gears fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold mb-0"><?=APP_NAME?></span>
        </div>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form style="width: 23rem;" id="form_login" method="post" action="?mt=login_submit">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Bem Vindo de Volta!</h3>
                <div class="form-outline mb-4">
                    <input type="email" id="InputEmail" name="InputEmail" required
                           class="form-control form-control-lg"/>
                    <label class="form-label" for="InputEmail">Endereço de Email</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="password" id="InputPassword" name="InputPassword" required
                           class="form-control form-control-lg"/>
                    <label class="form-label" for="InputPassword">Senha</label>
                    <p class="text-danger"> <?php
                        echo $_SESSION['server_error'] ?? ''; ?></p>
                </div>
                <div class="pt-1 mb-4">
                    <button id="btn_login" class="btn btn-info btn-lg btn-block" type="submit">Entrar
                    </button>
                </div>
                <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Esqueceu a senha?</a></p>
                <p>Não tem uma conta? <a href="#" id="novo_cadastro" class="link-info">Cadastre-se aqui</a></p>
            </form>
        </div>
    </div>
    <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="./assets/img/backgroundLogin.jpg"
             alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: center;">
    </div>
</div>
