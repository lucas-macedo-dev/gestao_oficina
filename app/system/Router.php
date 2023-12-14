<?php

namespace gestao\System;
use Exception;
use gestao\Controllers\MainController;

class Router
{
    public static function dispatch(): void
    {
        // main route values
        $httpverb   = $_SERVER['REQUEST_METHOD'];
        $controller = 'mainController';
        $method     = 'index';

        // check uri parameters
        if(isset($_GET['ct'])) {
            $controller = $_GET['ct'];
        }

        if (isset($_GET['mt'])) {
            $method = $_GET['mt'];
        }

        // method parameters
        $parameters = $_GET;

        // remove controller and method from parameters
        if (key_exists("ct", $parameters)) {
            unset($parameters['ct']);
        }
        if (key_exists("mt", $parameters)) {
            unset($parameters['mt']);
        }

        // tries to instanciate the controller and execute the method
        try {
            $class = "gestao\Controllers\\$controller";
            $controller = new $class();
            $controller->$method(...$parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
