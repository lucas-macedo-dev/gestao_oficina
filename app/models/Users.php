<?php

namespace gestao\Models;

use gestao\Models\BaseModel;

class Users extends BaseModel
{
    public function new_user($user, $email, $pass): array
    {
        $retorno = [];
        $params  = [
            ':usuario'      => $user,
            ':email'        => $email,
            ':senha'        => password_hash($pass, PASSWORD_DEFAULT),
            ':datainclusao' => date('Y-m-d H:i:s')
        ];

        $this->db_connect();
        $results = $this->non_query(
            "INSERT INTO gof_usuarios (usuario, email, senha, datainclusao)
                    VALUES (:usuario, :email, :senha, :datainclusao)",
            $params
        );

        if ($results->affected_rows == 0) {
            $retorno['status']  = false;
            $retorno['message'] = $results->message;
            return $retorno;
        }

        $retorno['status']  = true;
        $retorno['message'] = $results->message;
        return $retorno;
    }

    public function check_login($email, $pass): array
    {
        $retorno = [];
        $params  = [
            ':email' => $email
        ];

        $this->db_connect();
        $results = $this->query(
            "SELECT codusuario, senha FROM gof_usuarios WHERE email = :email",
            $params
        );

        // if is no user
        if ($results->affected_rows == 0) {
            $retorno['status']    = false;
            $resultsto['message'] = 'Usuario ou senha inexistentes.';
            return $retorno;
        }

        if (!password_verify($pass, $results->results[0]->senha)) {
            $retorno['status']  = false;
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
            "SELECT * FROM gof_usuarios  WHERE email = :email",
            [':email' => $email]
        );


        if ($results->affected_rows == 0) {
            return [
                'status' => false
            ];
        }

        // login is ok
        return [
            'codusuario'   => $results->results[0]->codusuario,
            'nivelusuario' => $results->results[0]->nivelusuario,
            'usuario'      => $results->results[0]->usuario
        ];
    }
}