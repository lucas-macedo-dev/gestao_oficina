document.getElementById('form_login').addEventListener('submit', (e) => {
    e.preventDefault();
    logar();
})

function logar() {
    let email = document.getElementById('InputEmail').value;
    let pass = document.getElementById('InputPassword').value;

    if (!email) {
        alert('Informe seu E-mail para logar');
        document.getElementById('InputEmail').focus()
    }

    if (!pass) {
        alert('Informe sua senha para logar');
        document.getElementById('InputPassword').focus()
    }

    let options = {
        method: 'POST',
        body  : JSON.stringify({
            mt : 'login',
            email: email,
            pass : pass
        })
    }

    fetch(`../public/index.php?mt=login_submit`, options).then(function (response) {
        if (!response.ok) {
            //
            return false;
        }
        response.json().then(function (retorno) {
            if (retorno) {
                if (retorno.login) {
                    window.location.href = "../app/views/home.php";
                }
            } else {
                //
            }
        });
    });
}
