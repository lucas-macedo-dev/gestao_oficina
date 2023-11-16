<?php

namespace gestao\Controllers;

class Main
{
    public function index($id)
    {
        echo 'Estou na controller Main - Index';
        echo '<br>';
        echo "o id foi $id";
    }
}
