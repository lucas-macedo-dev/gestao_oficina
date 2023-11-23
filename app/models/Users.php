<?php

namespace gestao\Models;
use gestao\Models\BaseModel;

class Users extends BaseModel
{
    public function get_total_users()
    {
        $this->db_connect();
        return $this->query("SELECT COUNT(*) total FROM dados_usuarios");
    }
}