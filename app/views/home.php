<?php
session_start();
if(!check_session()) {
    header("Location: index.php");
    exit();
}
?>
