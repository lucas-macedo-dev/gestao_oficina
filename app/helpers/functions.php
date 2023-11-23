<?php

function get_active_user_name()
{
    return $_SESSION['user']->name;
}

// =======================================================
function printData($data, $die = true): void
{
    echo '<pre>';
    if(is_object($data) || is_array($data)){
        print_r($data);
    } else {
        echo $data;
    }

    if($die){
        die('<br>FIM</br>');
    }
}