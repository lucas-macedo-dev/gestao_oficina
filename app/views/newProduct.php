<?php
if(!check_session()) {
    header("Location: index.php");
    exit();
}
?>

<div class="row mt-3 p-3">
    <div class="col-12">
        <h4>Informe as Especificações do Produto</h4>
    </div>
    <div class="col-12">
        <form action="?ct=ProductsController&mt=create_new_product" method="post">
            <div class="mb-3">
                <label for="product_name" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="product_name" name="product_name">
            </div>
            <div class="mb-3">
                <label for="purchase_price" class="form-label">Preço de Compra</label>
                <input type="number" class="form-control" id="purchase_price" placeholder="R$ 00.00">
            </div>
            <div class="mb-3">
                <label for="sale_price" class="form-label">Preço de Venda</label>
                <input type="number" class="form-control" id="sale_price" placeholder="R$ 00.00">
            </div>
            <div class="mb-3">
                <label for="product stock" class="form-label">Estoque</label>
                <input type="number" class="form-control" id="product stock" placeholder="0">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Insira as especificações do seu produto aqu"
                          id="product_description"></textarea>
                <label for="product_description">Descricão</label>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="product_img">Imagem do Produto</label>
                <input type="file" class="form-control" id="product_img">
            </div>
            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="product_stats" checked>
                <label class="form-check-label" for="product_stats">Inativo | Ativo</label>
            </div>
            <div class="mb-3">
                <span class="text-danger"><?= $_SESSION['errors']['new_products_erros'] ?? '' ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
