<?php
if (!check_session()) {
    header("Location: index.php");
    exit();
}
print_r($_SESSION);
?>