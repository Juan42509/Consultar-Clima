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
                                        <a class="dropdown-item" href="<?= base_url() ?>Usuario/editar">Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url() ?>Usuario/logout">Cerrar sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>