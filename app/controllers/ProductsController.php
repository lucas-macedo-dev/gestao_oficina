<?php
declare(strict_types = 1);
namespace gestao\Controllers;

use gestao\Controllers\BaseController;
use gestao\Models\Products;

class ProductsController extends BaseController
{
    public function my_products($data = [])
    {
        if (!check_session()) {
            header("Location: index.php");
            return;
        }
        $this->view('layouts/html_header');
        $this->view('productsPage', $data);
        $this->view('layouts/html_footer');
    }

    public function new_product($data = [])
    {
        if (!check_session()) {
            header("Location: index.php");
            return;
        }

        $this->view('layouts/html_header');
        $this->view('newProductPage', $data);
        $this->view('layouts/html_footer');
    }

    public function create_new_product()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['errors'] = [
                'new_products_erros' => 'Método inválido'
            ];
            $this->new_product();
        }
        $validations_errors = [];


        if (!$_POST['product_name']){
            $validations_errors[] = "O nome do produto é obrigatório";
        }

        if(!$_POST['purchase_price']){
            $validations_errors[] = "O preço de compra é obrigatório";
        }

        if(!$_POST['product_stock']){
            $validations_errors[] = "O estoque do produto é obrigatório";
        }

        if(!empty($validations_errors)){
            $validations_errors['cor'] = 'danger';
            $this->new_product($validations_errors);
        }

        $product_specifications                           = [];
        $product_specifications['product_name']           = $_POST['product_name'];
        $product_specifications['product_purchase_price'] = $_POST['purchase_price'];
        $product_specifications['product_sale_price']     = $_POST['sale_price'];
        $product_specifications['product_stock']          = $_POST['product_stock'];
        $product_specifications['product_description']    = $_POST['product_description'];

        if (isset($_FILES['product_img']) && ($_FILES['product_img']['error'] == UPLOAD_ERR_OK) ) {
            $tipo_arquivo = $_FILES['product_img']['type'];
            $caminho_temporario = $_FILES['product_img']['tmp_name'];
            $nome_arquivo = md5($_FILES['product_img']['name'] . strtotime('now')) . '.' . explode('/', $tipo_arquivo)[1];

            $caminho_destino = '../public/assets/uploads/' . $nome_arquivo;
            move_uploaded_file($caminho_temporario, $caminho_destino);
        }

        $product_specifications['product_img']            = $nome_arquivo ?? '';
        $product_specifications['product_stats']          = 'A';

        if(!@$_POST['product_stats']){
            $product_specifications['product_stats'] = 'I';
        }

        $model = new Products();
        $results = $model->register_product($product_specifications);

        if ($results['status'] === false) {
            $data = [
                'msg' => $results['message'],
                'cor' => 'danger'
            ];
            $this->new_product($data);
        } else {
            $data = [
                'msg' => $results['message'],
                'cor' => 'success'
            ];
            $this->new_product($data);
        }
    }
}