<style>
    .api{
        background: #676e6c;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #151516, #b3bebc);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6c7177, #212725); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>

<div class="card p-5 mt-5 bg-light api">
<h1 class="mt- mb-5 text-center fw-bold text-white" style="font-family:cursive;">CONSULTA EL CLIMA DE TU CIUDAD</h1>

    <form id="Form_consul_api">
        <div class="form-group row mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label text-white fw-bold">Ciudad</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Escribe tu ciudad">
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label text-white fw-bold">Pais</label>
            <div class="col-sm-10">
            <select id="pais" name="pais" class="form-control">
                <option selected>--Seleccione--</option>
                <option value="AR">Argentina</option>
                <option value="CO">Colombia</option>
                <option value="CR">Costa Rica</option>
                <option value="ES">España</option>
                <option value="US">Estados Unidos</option>
                <option value="MX">México</option>
                <option value="PE">Perú</option>
            </select>
            </div>
        </div>

        <button type="submit" name="btn-buscar" id="btn-buscar" class="btn btn-warning">Consultar</button>
    </form>
    <div id="clima"></div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        
        $("#btn-buscar").click(function(e){
            e.preventDefault();

            if($("#ciudad").val() != '' && $("#pais").val()){
                $.ajax({
                url: '<?=base_url()?>Api/clima',
                data: $("#Form_consul_api").serialize(),
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
                        spinner += "</div>"

                        $("#clima").html(spinner);
                    },

                
                    success: function(data) {



                        let datos = JSON.parse(data);
                        console.log(datos);

                        while($('#clima').firstChild){
                            $('#clima').removeChild($('#clima').firstChild);
                        }

                        let card;
                        card = "<div class='card text-white bg-secondary mb-3' style='max-width: 50rem; margin-left: 253px'>"
                        card += "<div class='card-header text-center fw-bold' style='font-size: 40px;'>"+datos.name+"</div>"
                        card += "<div class='card-body'>"
                        card += "<h5 class='card-title text-center' style='font-size: 30px;'>Temp Actual: "+ parseInt(datos.main['temp'] - 273.15)+"°</h5>"
                        card += "<p class='card-text text-center' style='font-size: 20px;'>Temp max: "+parseInt(datos.main['temp_max'] - 273.15)+"°</p>"
                        card += "<p class='card-text text-center' style='font-size: 20px;'>Temp max: "+parseInt(datos.main['temp_min'] - 273.15)+"°</p>"
                        card += "</div>"
                        card += "</div>"

                        $("#clima").html(card);
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