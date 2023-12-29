<?php

if (!check_session()) {
    header("Location: index.php");
    exit();
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
    <div class="row mt-3 p-3">
        <div class="col-12">
            <h4>Informe as Especificações do Produto</h4>
        </div>
        <div class="col-12">
            <form action="?ct=ProductsController&mt=create_new_product" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="mb-3">
                    <label for="purchase_price" class="form-label">Preço de Compra</label>
                    <input type="number" class="form-control" id="purchase_price" name="purchase_price"
                           placeholder="R$ 00.00">
                </div>
                <div class="mb-3">
                    <label for="sale_price" class="form-label">Preço de Venda</label>
                    <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="R$ 00.00">
                </div>
                <div class="mb-3">
                    <label for="product stock" class="form-label">Estoque</label>
                    <input type="number" class="form-control" id="product_stock" name="product_stock" placeholder="0">
                </div>
                <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Insira as especificações do seu produto aqu"
                          id="product_description" name="product_description"></textarea>
                    <label for="product_description">Descricão</label>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="product_img">Imagem do Produto</label>
                    <input type="file" class="form-control" id="product_img" name="product_img">
                </div>
                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="product_stats" name="product_stats" checked>
                    <label class="form-check-label" for="product_stats">Inativo | Ativo</label>
                </div>
                <?php if (!empty($data)) {
                    $msg = '';
                $msg .= '
                <div class="alert alert-' . $data['cor'] . ' d-flex align-items-center" role="alert">
                    <div>';
                    if (count($data) > 1) {
                        foreach ($data as $key => $value) {
                            if($key != 'cor'){
                                $msg .= '<p>' . $value . '</p>';
                            }
                        }
                    }
                        $msg .=  '
                        </div>
                    </div>';
                echo $msg;
                }
                ?>
                <div class="mb-3">
                    <span class="text-danger"><?= $_SESSION['errors']['new_products_erros'] ?? '' ?></span>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</main>
