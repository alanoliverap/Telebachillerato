<?php
include('centroEducativoClass.php');
include('config.php');
$userClass = new centroEducativoClass();
$errorMsgReg='';
/* Signup Form */
if (!empty($_POST['enviarSubmit'])) 		
{
	$numero_centro=$_POST['no_centro'];
	$nombre_centro=$_POST['nom_centro'];
	$direccion_centro=$_POST['dir_centro'];
	$telefono_centro=$_POST['tel_centro'];
	$zona_edu=$_POST['educativaZona'];

	/* Regular expression check */
	/*$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

	if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
	{*/
		$uid=$userClass->userRegistration($numero_centro,$nombre_centro,$direccion_centro,$telefono_centro,$zona_edu);
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
							<li><a id="id_centro_educativo_registro" href="#">Registrar Centros Educativos</a></li>						
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
	
                

      <div class="container">
      <div class="row">
      	<div class="col-md-8"></div>
      	<div class="col-md-3">
      		
      	</div>
      </div>


      <div class="row">
      	<div class="col-md-3"></div>
        <div class="col-md-6">
          <section>
            <h1>Registrar Centro Educativo</h1>
            <form  method="post">
              <div class="form-group"> 
                <label for="title">Numero</label>
                <input class="form-control" id="title" type="text" name="no_centro" value="">
              </div>
            
              <div class="form-group">
                <label for="opening-crawl">Nombre</label>
                <input class="form-control" id="title" type="text" name="nom_centro" value="">
              </div>
             
             <div class="form-group">
                <label for="producers">Direccion</label>
                <input class="form-control" id="title" type="text" name="dir_centro" value="">
              </div>

              <div class="form-group">
                <label for="directors">Telefono</label>
                <input class="form-control" id="title" type="text" name="tel_centro" value="">
              </div>

              <div class="form-group">
                <label for="directors">Zona educativa</label>
                <input class="form-control" id="title" type="text" name="educativaZona" value="">
              </div>
              
              

              <input class="btn btn-success " type="submit" name="enviarSubmit" value="Registrar Centro Educativo">
            </form>
          </section>

        </div>
      </div>  
    </div>
          

</body>

<script type="text/javascript" src= "js/bootstrap.js"></script>

</html>

