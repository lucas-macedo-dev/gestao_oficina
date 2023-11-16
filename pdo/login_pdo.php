<?php

session_start();
require_once 'conexaoPDO.php';

$conn = new conexaoPDO();
$pdo  = $conn->conectar();

$dados = file_get_contents('php://input');
$dados = json_decode($dados);

$email = $dados->email /*"lucas@teste.com"*/
;
$pass  = md5($dados->pass) /*MD5(123)*/
;

$sql  = 'select * from dados_usuarios where email = :email and senha =  :pass';
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);

if ($stmt->execute()) {
    if ($stmt->rowCount() == 1) {
        $perm_login         = 's';
        $_SESSION["logado"] = true;
    } else {
        $perm_login         = 'n';
        $_SESSION["logado"] = false;
    }
}
echo json_encode($perm_login);
