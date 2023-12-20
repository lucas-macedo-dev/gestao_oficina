<?php

namespace gestao\Models;

use gestao\Models\BaseModel;

class Users extends BaseModel
{
    public function new_user($name, $email, $pass, $cel): array
    {
        $retorno = [];
        $params = [
            ':nome' => $name,
            ':email' => $email,
            ':senha' => password_hash($pass, PASSWORD_DEFAULT),
            ':celular' => $cel,
            ':data_inclusao' => date('Y-m-d H:i:s')
        ];

        $this->db_connect();
        $results = $this->non_query(
            "INSERT INTO dados_usuarios (nome, email, senha, telefone, dta_inclusao)
                    VALUES (:nome, :email, :senha, :celular, :data_inclusao)",
            $params
        );

        if ($results->affected_rows == 0) {
            $retorno['status'] = false;
            $retorno['message'] = $results->message;
            return $retorno;
        }

        $retorno['status'] = true;
        $retorno['message'] = $results->message;
        return $retorno;

    }
    public function check_login($email, $pass): array
    {
        $retorno = [];
        $params = [
            ':email' => $email
        ];

        $this->db_connect();
        $results = $this->query(
            "SELECT id, senha FROM dados_usuarios WHERE email = :email",
            $params
        );

        // if is no user
        if ($results->affected_rows == 0) {
            $retorno['status'] = false;
            $retorno['message'] = $results->message;
            return $retorno;
        }

        if(!password_verify($pass, $results->results[0]->senha)){
            $retorno['status'] = false;
            $retorno['message'] = 'Login inválido.';
            return $retorno;
        }
        // login is ok
        return [
            'status' => true
        ];
    }

    public function get_user_data($email): array
    {
        $this->db_connect();
        $results = $this->query(
            "SELECT * FROM dados_usuarios  WHERE email = :email",
            [':email' => $email]
        );


        if ($results->affected_rows == 0) {
            return [
                'status' => false
            ];
        }

        // login is ok
        return [
            'user_id' => $results->results[0]->ID
        ];
    }
}