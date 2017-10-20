<?php
include("config.php");
include('userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
/* Login Form */
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
$tipousuario=$_POST['tipousuario'];
if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
{
$uid=$userClass->userLogin($usernameEmail,$password,$tipousuario);
if($uid)
{
$url=BASE_URL.'home.php';
header("Location: $url"); // Page redirecting to home.php 
}
else
{
$errorMsgLogin="Please check login details.";
}
}
}

/* Signup Form */
if (!empty($_POST['signupSubmit'])) 
{
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
$uid=$userClass->userRegistration($username,$password,$email,$name);
if($uid)
{
$url=BASE_URL.'home.php';
echo BASE_URL;
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
<head><link rel="stylesheet" type="text/css" href="css/estilos.css">
      <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css"></head>
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
<div id="login">
	<div id="titulo">
<h3>Login de control escolar</h3>
</div>
<p>para iniciar sesion selecciona el tipo de usuario de acuerdo a tus actividades</p>
<form method="post" action="" name="login">
	<select id="tipousuario" name="tipousuario">
		<option>administrador</option>
		<option>auxiliar</option>
	</select>
<input type="text" name="usernameEmail" autocomplete="off" placeholder="Usuario" />
<input type="password" name="password" autocomplete="off" placeholder="Contraseña" />
<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
<input type="submit" class="button" name="loginSubmit" value="Login">
</form>
</div>
</body>
</html>