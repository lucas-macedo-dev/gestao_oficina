<?php

namespace gestao\Models;

use gestao\Models\BaseModel;

class Products extends BaseModel
{
    public function register_product($product_specifications): array
    {
        $params = [
            ':nome'         => $product_specifications['product_name'],
            ':precocompra'  => $product_specifications['product_purchase_price'],
            ':precovenda'   => $product_specifications['product_sale_price'],
            ':estoque'      => $product_specifications['product_stock'],
            ':descricao'    => $product_specifications['product_description'],
            ':imagem'       => $product_specifications['product_img'],
            ':status'       => $product_specifications['product_stats'],
            ':usuinclusao'  => $_SESSION['usuario'],
            ':datainclusao' => date('Y-m-d H:i:s')
        ];


        $this->db_connect();
        $results = $this->non_query(
            "INSERT INTO gof_produtos (
                      nomeproduto,
                      status,
                      precocompra,
                      precovenda,
                      estoque,
                      descricao,
                      imagem,
                      usuinclusao,
                      datainclusao)
            VALUES (
                    :nome,
                    :status,
                    :precocompra,
                    :precovenda,
                    :estoque,
                    :descricao,
                    :imagem,
                    :usuinclusao,
                    :datainclusao)", $params
        );

        if ($results->affected_rows == 0) {
            $retorno['status']  = false;
            $retorno['message'] = $results->message;
            return $retorno;
        }

        $retorno['status']  = true;
        $retorno['message'] = 'O produto foi cadastrado com sucesso!';
        return $retorno;
    }
}