<?php

namespace gestao\Models;

use gestao\Models\BaseModel;

class Users extends BaseModel
{
    public function getAcesso($email, $pass): array
    {
        $params = [
            ':email' => $email,
            ':senha' => $pass
        ];

        $this->db_connect();
        $results = $this->query(
                            "
                                select *
                                    from dados_usuarios
                                where email = :email
                                  and senha = :senha
                                ",
            $params
        );

        // if is no user
        if ($results->affected_rows == 0) {
            return [
                'status' => false
            ];
        }

        // login is ok
        return [
            'status' => true
        ];
    }

    public function get_user_data($email)
    {
        $params = [
            ":email" => "lucas@teste2.com"
        ];

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