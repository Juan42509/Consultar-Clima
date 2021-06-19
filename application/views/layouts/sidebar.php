<body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-secondary" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-secondary text-white font-weight-bold">OPCIONES</div>
                <div class="list-group list-group-flush bg-secondary">
                    <a class="list-group-item list-group-item-action list-group-item-secondary ap-3" href="<?= base_url() ?>Usuario">Inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="<?= base_url() ?>Mensajes">Mensajes</a>
                    <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="<?= base_url() ?>Api">Consultar Clima</a>
                    <?php if($this->session->userdata('rol') == 'admin'): ?>
                    <a class="list-group-item list-group-item-action list-group-item-secondary p-3" href="<?= base_url() ?>Admin">Administrar Usuarios</a>
                    <?php endif; ?>
                </div>
            </div>