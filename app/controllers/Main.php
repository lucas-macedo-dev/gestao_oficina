<?php

namespace gestao\Controllers;

use gestao\Controllers\BaseController;
use gestao\Models\Users;

class Main extends BaseController
{
    public function index()
    {
        $model   = new Users();
        $results = $model->get_total_users();

        printData($results);

        $this->view('layouts/header');
        $this->view('home');
        $this->view('layouts/footer');
    }
}
