<h1 class="mt-5 mb-5 text-center">ADMINISTRACIÓN DE USUARIOS</h1>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <th scope="row"><?= $usuario->id ?></th>
                <td><?= $usuario->nombre ?></td>
                <td><?= $usuario->apellidos ?></td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="<?= base_url() ?>Admin/editar?id=<?= $usuario->id ?>" role="button">Editar</a>
                    <a name="" id="" class="btn btn-danger" href="<?= base_url() ?>Admin/eliminar?id=<?= $usuario->id ?>" role="button">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
