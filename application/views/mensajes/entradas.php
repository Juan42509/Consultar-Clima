<h1 class='mt-4 text-center'>Mensajes de tus compañeros</h1>
<p class="text-center fw-bold" style="font-family: Verdana, Geneva, Tahoma, sans-serif; text-align: justify;">
    En esta apartado puedes crear mensajes, modificarlo y eliminarlo pero esas opciones solo se activan
    si tu fuiste el creador del mensaje.
</p>
<a name="crear" class="btn btn-danger" href="<?= base_url() ?>Mensajes/crear" role="button">Crear Mensaje</a><br><br>

<form class="form-inline" id="form_buscar">
  <div class="form-group mx-sm-3 col-4 mb-5">
    <input type="text" class="form-control col-12" id="buscar" name="buscar" placeholder="Buscar el titulo del mensaje" style="margin-left: 375px;">
  </div>
  <button type="submit" id="btn-buscarmsj" class="btn btn-primary mb-5 rounded-circle" style="margin-left: 353px;"><i class="fas fa-search"></i></button>
</form>

<div class="row">

<?php if($mensajes): ?>
    <?php foreach($mensajes as $mensaje): ?>
    <div class="col-3">
        <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h3 class="card-title"><?= $mensaje->titulo ?></h3>
        <h6 class="card-subtitle mb-2 text-muted"><?= $mensaje->fecha ?></h6>
        Usuario: <span class="fw-bold"><?= $mensaje->nombre ?></span>
        <p class="card-text"><?= $mensaje->descripcion ?></p>

        <?php if($this->session->userdata('id') == $mensaje->usuario_id): ?>
        <a name="" id="" class="btn btn-primary" href="<?= base_url()?>Mensajes/edit?id=<?= $mensaje->id ?>" role="button">Editar</a>
        <a name="" id="btn-eliminarmj" class="btn btn-danger" href="<?= base_url() ?>Mensajes/eliminar?id=<?= $mensaje->id ?>" role="button">Eliminar</a>
        <?php endif; ?>
    </div>
</div>
    </div>
    <?php endforeach ?>
<?php endif; ?>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        $("#btn-buscarmsj").click(function(e){
            e.preventDefault();

            if($("#buscar").val() != ''){
                $.ajax({
                url: '<?=base_url()?>Mensajes/buscar',
                data: $("#form_buscar").serialize(),
                type: 'post',

                    beforeSend: function(){
                        let spinner;
                        
                        spinner = "<div style='margin-left: 575px'>"
                        spinner += "<div class='sk-chase'>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "<div class='sk-chase-dot'></div>"
                        spinner += "</div>"


                        $("#clima").html(spinner);
                    },

                
                    success: function(data) {
                        var datos = JSON.parse(data);
                        console.log(datos);

                        var newCard = ''
                        $.each(datos,function(i,item){

                            newCard +=
                                "<div class='col-3'>"
                                +"<div class='card' style='width: 18rem;'>"
                                +"<div class='card-body'>"
                                +"<h3 class='card-title'>"+ datos[0].titulo +"</h3>"
                                +"<h6 class='card-subtitle mb-2 text-muted'>"+ datos[0].fecha +"</h6>"
                                +"Usuario: <span class='fw-bold'>"+ datos[0].nombre +"</span>"
                                +"<p class='card-text'>"+ datos[0].descripcion +"</p>"
                                +"</div>"
                                +"</div>"
                                +"</div>"
                            
                        });

                        $(".row").html(newCard);
                
                    }
                });
            }else{
                    alert("Todos los campos son obligatorios");
                    return false;
                }
                return false;
        });
    });
</script>