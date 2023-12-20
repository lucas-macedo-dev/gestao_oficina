<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= APP_NAME ?></title>
        <!-- google fonts -->
        <!-- bootstrap -->
        <link rel="stylesheet" href="./assets/assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/assets/fontawesome/all.min.css">
        <script src="./assets/assets/bootstrap/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../public/assets/app.css">
    </head>
    <body>
        <?php
        if (check_session()){
        echo '
        <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar-principal">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><?= APP_NAME ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?mt=index">In&iacute;cio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?ct=ProductsController&mt=meus_produtos">Meus Produtos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Meus Serviços
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?ct=ProductsController&mt=new_product">Cadastrar Novo Produto</a></li>
                                <li><a class="dropdown-item" href="#">Cadastrar Nova NF</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Rela&oacute;rios</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="pesquisar">
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                    <div class="col-2 text-end">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    <i class="fa-solid fa-circle-user fa-2xl" style="color: #253031"></i>&nbsp;
                            </button>
                            
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
                              <li><a class="dropdown-item" href="#">Configurações</a></li>
                              <li><a class="dropdown-item" href="?mt=logout">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        ';
        }
        ?>
