<?php

use gestao\System\Router;

session_start();

require_once '../vendor/autoload.php';
Router::dispatch();