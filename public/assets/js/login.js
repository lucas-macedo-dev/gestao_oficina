document.getElementById('novo_cadastro').addEventListener('click', (e) => {
    document.getElementById('form_login').action = '?mt=register';
    document.getElementById('form_login').innerHTML = `
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Informe os Dados do Cadatro</h3>
                <div class="form-outline mb-4">
                    <input type="text" id="InputUser" name="InputUser" required
                           class="form-control form-control-lg"/>
                    <label class="form-label" for="InputUser">Usuário</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="email" id="InputEmail" name="InputEmail" required
                           class="form-control form-control-lg"/>
                    <label class="form-label" for="InputEmail">Endereço de Email</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="password" id="InputPassword" name="InputPassword" required
                           class="form-control form-control-lg"/>
                    <label class="form-label" for="InputPassword">Senha</label>
                </div>
                <div class="pt-1 mb-4">
                    <button id="btn_cadastro" class="btn btn-success btn-lg btn-block" type="submit">Cadastrar
                    </button>
                </div>
    `;
});
