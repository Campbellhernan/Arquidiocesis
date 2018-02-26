<?php
session_start();

if(isset($_SESSION['usuario'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar sesión - Arquidiocesis</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../bg-01.jpg);">
					<span class="login100-form-title-1">
						Arquidiocesis
					</span>
				</div>

				<form class="login100-form validate-form" action="validarLogin.php" method="post">
                    <label class="h3" style="padding-left:20%">Iniciar Sesión</label>
                    <div>
                        <?php
                            if(isset($_REQUEST['error']))
                                echo "<div class='alert alert-danger'>Usuario o contraseña invalidos</div>";
                        ?>
                    </div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="El usuario es requerido">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="usuario" placeholder="usuario" autofocus>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "La contraseña es requerida">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="contraseña">
						<span class="focus-input100"></span>
                    </div>
                    <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Recuerdame
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Entrar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!--===============================================================================================-->
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="../dist/js/main.js"></script>
<!--===============================================================================================-->    
</body>
</html>
