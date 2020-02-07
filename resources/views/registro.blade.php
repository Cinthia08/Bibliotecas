<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/fondo.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form">
				@csrf
					<div class="login100-form-avatar">
						<img src="images/usuario.png" alt="Usuario">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Registrarse
					</span>



					<div class="row">
			<div class="col-md-12">
				<input type="text" placeholder="Escriba el usuario" class="form-control" v-model="nick"><br>

				<input type="text" placeholder="Escriba su nombre" class="form-control"
				v-model="nombre"><br>

				<input type="text" placeholder="Escriba sus apellidos" class="form-control" v-model="apellidos"><br>

				<input type="password" placeholder="Escriba unacontraseña" class="form-control" v-model="password"><br>

				<input type="file" class="form-control" accept="image/jpeg" maxlength="1024" @change="alSeleccionar"><br>

			</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" value="Login">
							Registrar
						</button>
						</a>
					</div>

					<!--<div class="text-center w-full p-t-25 p-b-230">
					<font color="white">
						<h5>¿No Tiene Una Cuenta?</h5>
					</font>
						<a href="#" class="txt1">
							Registrese
						</a>
					</div>-->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



</body>
</html>