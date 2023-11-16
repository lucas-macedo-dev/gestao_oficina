<?php

require_once 'conexaoPDO.php';

$conn    = new conexaoPDO();
$pdo     = $conn->conectar();
$retorno = "";
try {
    $dados = file_get_contents('php://input');
    $dados = json_decode($dados);

    $nome     = $dados->nome ?? null;
    $email    = $dados->email ?? null;
    $senha    = $dados->senha ?? null;
    $telefone = $dados->telefone ?? null;

    $sql  = "
        insert into dados_usuarios (NOME, EMAIL, SENHA, TELEFONE)
            values (:nome, :email, :senha, :telefone)
        ";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);

    if ($stmt->execute()) {
       /*TODO: verificar qual o retorno do banco quando realizo um insert */
    }

    /*TODO: inserir o retorno especificando que se o dado foi inserido ou nao*/;
} catch (Exception $e) {
    $retorno["erro"] = "Erro ao conectar com o banco de dados: " . $e->getMessage();
    echo json_encode($retorno);
}
