<?php

namespace gestao\Controllers;

use gestao\Controllers\BaseController;

class Main extends BaseController
{
    public function index(): void
    {
        $data['nome'] = "Lucas";
        $data['apelido'] = "teste";

        $this->view('layouts/header');
        $this->view('home', $data);
        $this->view('layouts/footer');
    }
}
