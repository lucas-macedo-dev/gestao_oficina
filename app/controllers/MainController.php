<?php

namespace gestao\Controllers;

use gestao\Controllers\BaseController;
use gestao\Models\Users;

class MainController extends BaseController
{
    public function index(): void
    {
        if (!check_session()) {
            $this->login_form();
            return;
        }

        $perm['login'] = true;
        echo json_encode($perm);
    }

    public function login_form()
    {
        if (check_session()) {
            $this->index();
            return;
        }

        $this->view('layouts/html_header');
        $this->view('loginPage');
        $this->view('layouts/html_footer');
    }

    public function login_submit()
    {
        // check if there is already an active session
        if (check_session()) {
            $this->index();
            return;
        }

        // check if there was a post request
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }

        // form validation
        $validation_errors = [];
        if (empty($_POST['InputEmail']) || empty($_POST['InputPassword'])) {
            $validation_errors[] = "E-mail e senha são obrigatórios.";
        }

        $dados = file_get_contents('php://input');
        $dados = json_decode($dados);

        // get form data
        $email    = $dados->email;
        $password = $dados->pass;

        // check if username is valid email and between 5 and 50 chars
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation_errors[] = 'O e-mail tem que ser um email válido.';
        }

        // check if username is between 5 and 50 chars
        if (strlen($email ?? '') < 5 || strlen($email ?? '') > 50) {
            $validation_errors[] = 'O e-mail deve ter entre 5 e 50 caracteres.';
        }

        // check if password is valid
        if (strlen($password ?? '') < 6 || strlen($password ?? '') > 12) {
            $validation_errors[] = 'A senha deve ter entre 6 e 12 caracteres.';
        }

        // check if there are validation errors
//        if (!empty($validation_errors)) {
//            $_SESSION['validation_errors'] = $validation_errors;
//            $this->login_form();
//            return;
//        }

        $model   = new Users();
        $results = $model->getAcesso($email, $password);
       /* if ($results['status']) {
            // invalid login
            $_SESSION['server_error'] = 'Login inválido.';
            $this->login_form();
            return;
        };*/

        $user_id = $model->get_user_data($email);
        $_SESSION['user_id'] = $user_id;

        $this->index();
    }
}
