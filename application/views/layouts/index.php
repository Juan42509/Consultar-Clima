<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Consultar Clima</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url() ?>public/css/index.css" rel="stylesheet" />
    </head>
    <!-- /////// -->
    <!-- SideBar -->
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-secondary" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-secondary text-white font-weight-bold">OPCIONES</div>
                <div class="list-group list-group-flush bg-secondary">
                    <a class="list-group-item list-group-item-action list-group-item-secondary ap-3" href="<?= base_url() ?>Usuario">Inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="<?= base_url() ?>Mensajes">Mensajes</a>
                    <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="#!">Consultar Clima</a>
                    <?php if($this->session->userdata('rol') == 'admin'): ?>
                    <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="#!">Administrar Usuarios</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle fw-bold text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nombre').' '. $this->session->userdata('apellidos') ?></a>
                                    <div class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url() ?>Usuario/logout">Cerrar sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    
                    <h1 class="mt-4 text-center">Bienvenidos</h1>
                    <p>Esta aplicacion esta </p>
                    <p>
                        Make sure to keep all page content within the
                        <code>#page-content-wrapper</code>
                        . The top navbar is optional, and just for demonstration. Just create an element with the
                        <code>#sidebarToggle</code>
                        ID which will toggle the menu when clicked.
                    </p>

                    <div class="row">
                        <div class="col-3">
                        <div class="card text-white bg-primary  mb-3" style="max-width: 18rem;">
                            <div class="card-header fw-bold">Perfil</div>
                                <div class="card-body">
                                    <h5 class="card-title">Puedes ver tu perfil y modificar tus datos</h5>
                                    <a class="btn btn-outline-light" href="#" role="button">Ir</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card bg-warning  mb-3" style="max-width: 18rem;">
                                <div class="card-header fw-bold">Consultar Clima</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Consulta como esta el clima en tu pais</h5>
                                        <a class="btn btn-outline-light"" href="" role="button">Consultar</a>
                                    </div>
                                </div>
                        </div>
                    
                        <div class="col-3">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header fw-bold">Mensajes</div>
                            <div class="card-body">
                                <h5 class="card-title">Deja un mensaje para que todos lo puedan ver</h5>
                                <a class="btn btn-outline-light"" href="<?= base_url() ?>Mensajes" role="button">Ir</a>
                            </div>
                            </div>
                        </div>

                        <?php if($this->session->userdata('rol') == 'admin'): ?>
                            <div class="col-3">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header fw-bold">Administracion de usuarios</div>
                                <div class="card-body">
                                    <h5 class="card-title">Solo disponible para administradores</h5>
                                    <a class="btn btn-outline-light"" href="<?= base_url() ?>Admin" role="button">Ir</a>
                                </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>



                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url() ?>public/js/scripts.js"></script>
    </body>
    <footer>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            <div class="text-reset fw-bold">Desarrollador Juan Fernando Maldonado Gómez</div>
        </div>
    </footer>
</html>
