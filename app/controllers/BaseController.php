<?php

namespace gestao\Controllers;

abstract class BaseController
{
    public function view($view, $data = []): void
    {
        // check if data is array
        if (!is_array($data)) {
            die('Os dados não estão em formato de array: ' . var_dump($data));
        }

        // transform data into variables
        extract($data);

        // include the files if exists
        if (file_exists("../app/views/$view.php")) {
            require_once "../app/views/$view.php";
        } else {
            die ("View não encontrada: " . $view);
        }

    }
}