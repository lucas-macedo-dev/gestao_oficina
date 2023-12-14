<?php
namespace gestao\Controllers;

abstract class BaseController
{
    public function view($view, $data = [])
    {
        // check if data is array
        if(!is_array($data)){
            die("Data is not an array: " . var_dump($data));
        }

        // transforms data into variables
        extract($data);

        // includes the file if exists
        if(file_exists("../app/views/$view.php")){
            // Output buffering to capture the content
            ob_start();
            require_once "../app/views/$view.php";
            $content = ob_get_clean();

            // Output the content without leading/trailing white spaces
            echo trim($content);
        } else {
            die("View não encontrada: " . $view);
        }
    }
}