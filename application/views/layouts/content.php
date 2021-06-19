                <!-- Page content-->
                <div class="container-fluid">
                    
                    <h1 class="mt-4 mb-5 text-center">Bienvenidos</h1>
                    
                    <p style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: justify;">
                        En este menu vas a encontrar las opciones que nececites, ya sea desde
                        la modificación de perfil, consultar el clima y tambien tienes una bandeja
                        de mensajes donde puedes compartir tus ideas.
                        Las opciones ocultas solo pueden ser vistas por el administrador, con el que puedes entrar
                        con el correo <span style="text-decoration: underline;">admin@admin.com</span> la clave <span style="text-decoration: underline;">admin</span>. 
                    </p>

                    <div class="row" style="margin-top: 100px;">
                        <div class="col-3">
                        <div class="card text-white bg-primary  mb-3" style="max-width: 18rem;">
                            <div class="card-header fw-bold">Perfil</div>
                                <div class="card-body">
                                    <h5 class="card-title">Puedes ver tu perfil y modificar tus datos</h5>
                                    <a class="btn btn-outline-light"" href="<?= base_url() ?>Usuario/editar" role="button">Ir</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card bg-warning  mb-3" style="max-width: 18rem;">
                                <div class="card-header fw-bold">Consultar Clima</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Consulta como esta el clima en tu pais</h5>
                                        <a class="btn btn-outline-light"" href="<?= base_url() ?>Api" role="button">Consultar</a>
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