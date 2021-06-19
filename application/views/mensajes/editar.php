<div class="card p-5 mt-5 bg-light">
<h1 class="mt- mb-5 text-center" style="font-family:cursive ;">EDITA TU MENSAJE</h1>

    <form id="Form_crear_entrada" action="<?= base_url() ?>Mensajes/editado" method="POST">
    <input type="hidden" name="id" value="<?= $mensaje[0]->id ?>">
        <div class="form-group row mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $mensaje[0]->titulo ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
            <textarea name="descripcion" id="descripcion" cols="140" rows="4"><?= $mensaje[0]->descripcion ?></textarea>
            </div>
        </div>

        <button type="submit" name="btn-guardar" id="btn-guardar" class="btn btn-primary">Guardar</button>
    </form>

</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#btn-guardar').click(function(e){
            // e.preventDefault();

            $('#Form_crear_entrada').validate({
                rules:{
                    titulo: {required: true},
                    descripcion: {required: true, minlength: 5}
                },
                messages:{
                    titulo:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>',
                    },
                    descripcion: {
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
						minlength: '<br><div class="alert alert-danger ml-2" role="alert"> Minimo se deben introducir 5 caracteres</div>'
                    }
                }
            })
        });
});

</script>