<?php
include('userClass.php');
include('config.php');
$userClass = new userClass();
$errorMsgReg='';
/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
	$tipousuario=$_POST['tipousuario'];
	$username=$_POST['usernameReg'];
	$email=$_POST['emailReg'];
	$password=$_POST['passwordReg'];
	$name=$_POST['nameReg'];
	/* Regular expression check */
	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

	if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
	{
		$uid=$userClass->userRegistration($username,$password,$email,$name,$tipousuario);
		if($uid)
		{
			$url=BASE_URL.'home.php';
			header("Location: $url"); // Page redirecting to home.php 
		}
		else
		{
			$errorMsgReg="Username or Email already exists.";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tele bachillerato Michoacan</title>
	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <script type="text/javascript" src="js/main.js"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <meta charset="UTF-8">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" width="25%" src="media/logo.jpg">	
			</div>
			<div class="col-md-3">
				<img class="img-responsive" width="40%" src="media/michoacan.png">
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-1">
				<img class="img-responsive" width="63%" src="media/escudo.png">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
				
			<header>
			<nav>
				<ul>
					

					<li><a href="#"><span class="primero"><i class="icon icon-tag"></i></span>Alumnos</a>
						<ul>
							<li><a href="#">Registrar Alumno</a></li>
							<li><a href="#">Cambiar status del Aumno</a></li>
							<li><a href="#">Modificar Alumno</a></li>
							<li><a href="#">Consultar Alumno</a></li>
							<li><a href="#">Constancia de Alumno</a></li>
						</ul>
					</li>

					<li><a href="#"><span class="segundo"><i class="icon icon-tag"></i></span>Usuarios</a>
						<ul>
							<li><a href="#">Registrar Usuario</a></li>
							<li><a href="#">Cambiar Contrasena</a></li>
						</ul>
					</li>
					<li><a href="#"><span class="tercero"><i class="icon icon-suitcase"></i></span>Grupos</a>
						<ul>
							<li><a href="#">Registrar Grupos</a></li>						
							<li><a href="#">Consultar Grupo</a></li>
							<li><a href="#">Modificar Grupos</a></li>						
							<li><a href="#">Eliminar Grupo</a></li>							
						</ul>
					</li>
					<li><a href="#"><span class="cuarto"><i class="icon icon-text"></i></span>Centros Educativos</a>
						<ul>
							<li><a href="#">Registrar Centros Educativos</a></li>						
							<li><a href="#">Consultar Centros Educativos</a></li>
							<li><a href="#">Modificar Centros Educativos</a></li>						
							<li><a href="#">Eliminar Centros Educativos</a></li>	
							<li><a href="#">Zonas Educativas</a></li>						
						</ul>
					</li>
					<li><a href="<?php echo BASE_URL; ?>logout.php"><span class="quinto"><i class="icon icon-mail"></i></span>Salir</a></li>
				</ul>
			</nav>
		</header>

		</div>
		
	</div>
	
                <div id="signup">
<h3>Registrar Usuarios</h3>
<form method="post" action="" name="signup">
<label class="form1">Tipo Usuario</label>
<select class="form1" id="tipousuario" name="tipousuario">
		<option>administrador</option>
		<option>auxiliar</option>
</select>
<label class="form1">Nombre</label>
<input class="form1" type="text" name="nameReg" autocomplete="off" />
<label class="form1">Correo Electronico</label>
<input class="form1" type="text" name="emailReg" autocomplete="off" />
<label class="form1">Nombre de usuario</label>
<input type="text" name="usernameReg" autocomplete="off" />
<label class="form1">Contraseña</label>
<input class="form1" type="password" name="passwordReg" autocomplete="off"/>
<div class="form1" class="errorMsg"><?php echo $errorMsgReg; ?></div>
<input class="form1" type="submit" class="button" name="signupSubmit" value="Registrar">
</form>
</div>
          

</body>
</html>
