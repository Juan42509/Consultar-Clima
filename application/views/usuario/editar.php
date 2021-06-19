<div class="card p-5 mt-5 bg-light">
<h1 class="mt- mb-5 text-center" style="font-family:cursive ;">EDITA TU USUARIO</h1>

    <form id="Form_crear_entrada" action="<?= base_url() ?>Usuario/save" method="POST">
    <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>">
        <div class="form-group row mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $this->session->userdata('nombre'); ?>">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?= $this->session->userdata('apellidos'); ?>">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="emil" value="<?= $this->session->userdata('email'); ?>">
            </div>
        </div>

        <button type="submit" name="btn-guardar" id="btn-guardar" class="btn btn-primary">Guardar Cambios</button>
    </form>

</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#btn-guardar').click(function(e){
            // e.preventDefault();

            $('#Form_crear_entrada').validate({
                rules:{
                    nombre: {required: true},
                    apellidos: {required: true},
                    email: {required: true, email: true}
                },
                messages:{
                    nombre:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>',
                    },
                    apellidos: {
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
                    },
                    email:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
                        email: '<br><div class="alert alert-danger ml-2" role="alert"> El formato de email es incorrecto</div>' 
                    }
                }
            })
        });
});

</script>