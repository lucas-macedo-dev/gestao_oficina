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
        <script src="./assets/assets/jquery/jquery-3.6.0.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

        <style>
            .bi {
                display: inline-block;
                width: 1rem;
                height: 1rem;
            }

            /*
             * Sidebar
             */

            @media (min-width: 768px) {
                .sidebar .offcanvas-lg {
                    position: -webkit-sticky;
                    position: sticky;
                    top: 48px;
                }
                .navbar-search {
                    display: block;
                }
            }

            .sidebar .nav-link {
                font-size: .875rem;
                font-weight: 500;
            }

            .sidebar .nav-link.active {
                color: #2470dc;
            }

            .sidebar-heading {
                font-size: .75rem;
            }

            /*
             * Navbar
             */

            .navbar-brand {
                padding-top: .75rem;
                padding-bottom: .75rem;
                background-color: rgba(0, 0, 0, .25);
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
            }

            .navbar .form-control {
                padding: .75rem 1rem;
            }

            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }
        </style>

    </head>
    <body>
        <?php
        if (check_session()){
        echo '
            <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Gestor de Oficina</a>
                <ul class="navbar-nav flex-row d-md-none">
                  <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                      <svg class="bi"><use xlink:href="#search"/></svg>
                    </button>
                  </li>
                  <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                      <svg class="bi"><use xlink:href="#list"/></svg>
                    </button>
                  </li>
                </ul>
                
                <div id="navbarSearch" class="navbar-search w-100 collapse">
                  <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search"
                  aria-label="Search">
                </div>
            </header>
            <!-- Sidebar -->
            <div class="container-fluid">
                <div class="row">
                  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                        aria-labelledby="sidebarMenuLabel">
                      <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        data-bs-target="#sidebarMenu" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="?mt=index">
                              <svg class="bi"><use xlink:href="#house-fill"/></svg>
                              Dashboard
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                              Pedidos
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="?ct=ProductsController&mt=my_products">
                              <svg class="bi"><use xlink:href="#puzzle"/></svg>
                              Produtos
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="?ct=ProductsController&mt=new_product">
                              <svg class="bi"><use xlink:href="#cart"/></svg>
                              Novo Produto
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#people"/></svg>
                              Serviços
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#graph-up"/></svg>
                              Clientes
                            </a>
                          </li>
                        </ul>
                
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1
                        text-body-secondary text-uppercase">
                          <span>Saved reports</span>
                          <a class="link-secondary" href="#" aria-label="Add a new report">
                            <svg class="bi"><use xlink:href="#plus-circle"/></svg>
                          </a>
                        </h6>
                        <ul class="nav flex-column mb-auto">
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                              Current month
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                              Last quarter
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                              Social engagement
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                              Year-end sale
                            </a>
                          </li>
                        </ul>
                
                        <hr class="my-3">
                
                        <ul class="nav flex-column mb-auto">
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="#">
                              <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                              Configurações
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="?mt=logout">
                              <svg class="bi"><use xlink:href="#door-closed"/></svg>
                              Sair
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
        
        ';
        }
        ?>
