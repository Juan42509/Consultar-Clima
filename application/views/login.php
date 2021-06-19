<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>public/jquery-validate/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
</head>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3" style="margin: auto;">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-6">
								<a href="#" class="active" id="login-form-link">Iniciar sesión</a>
							</div>
							<div class="col-6">
								<a href="#" id="register-form-link">Regístrate ahora</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?= base_url() ?>Usuario/inicio" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" >
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar sesión" style="margin-left: 137px;">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="<?= base_url()  ?>Usuario/registro" method="POST" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Nombres">
									</div>
									<div class="form-group">
										<input type="text" name="apellidos" id="apellidos" tabindex="1" class="form-control" placeholder="Apellidos">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo electronico">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Crear cuenta" style="margin-left: 150px;">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(function() {

$('#login-form-link').click(function(e) {
	$("#login-form").delay(100).fadeIn(100);
	 $("#register-form").fadeOut(100);
	$('#register-form-link').removeClass('active');
	$(this).addClass('active');
	e.preventDefault();
});
$('#register-form-link').click(function(e) {
	$("#register-form").delay(100).fadeIn(100);
	 $("#login-form").fadeOut(100);
	$('#login-form-link').removeClass('active');
	$(this).addClass('active');
	e.preventDefault();
});

$('#login-submit').click(function(e){
            // e.preventDefault();

            $('#login-form').validate({
                rules:{
                    email: {required: true, email: true},
                    password: {required: true, minlength: 5}
                },
                messages:{
                    email:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>',
						email: '<br><div class="alert alert-danger ml-2" role="alert"> El formato de email es incorrecto</div>'
                    },
                    password: {
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
						minlength: '<br><div class="alert alert-danger ml-2" role="alert"> Minimo se deben introducir 5 caracteres</div>'
                    }
                }
            })
        });

		$('#register-submit').click(function(e){
            // e.preventDefault();

            $('#register-form').validate({
                rules:{
                    nombre: {required: true},
					apellidos:{required: true},
                    email: {required: true, email: true},
					password: {required: true, minlength:5} 
                },
                messages:{
                    nombre:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>',
                    },
					apellidos:{
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>',
                    },
					email: {
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
						email: '<br><div class="alert alert-danger ml-2" role="alert"> El formato de email es incorrecto</div>'
                    },
                    password: {
                        required: '<br><div class="alert alert-danger ml-2" role="alert"> El campo es requerido</div>', 
						minlength: '<br><div class="alert alert-danger ml-2" role="alert"> Minimo se deben introducir 5 caracteres</div>'
                    }
                }
            })
        });
});

</script>