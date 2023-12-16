<?php

if (!check_session()) {
    header("Location: index.php");
    exit();
}
echo 'página de produtos';
?>