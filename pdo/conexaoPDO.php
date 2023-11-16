<?php

class conexaoPDO
{
    private string $host    = "localhost";
    private string $usuario = "root";
    private string $senha   = "";
    private string $banco   = "gestao_oficina";

    public function conectar () {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->banco}";
            $conexao = new PDO ($dsn, $this->usuario, $this->senha);

            return $conexao;
        } catch (PDOException $e) {
            echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
        }
    }
}
