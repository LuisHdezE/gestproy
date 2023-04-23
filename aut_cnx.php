<?php
	
	session_start();

	include_once 'controller/dbconfig.php';

	//$email = $_POST['email'];
	//$password = $_POST['pass'];

	if(isset($_POST['usuario'])){
		$usuario=$_POST['usuario'];
		
	}
	if(isset($_POST['pass'])){
		
		$pass =$_POST['pass'];
	}
	
	$_SESSION['validado']='no';
	$_SESSION['usuario']='';
	//$mypassword = md5($mpass);
	$validar=$crud->validaUsuario($usuario, $pass);

	
	if ($validar=='ok') {

			$_SESSION['usuario']=$usuario;
			$_SESSION['validado']='ok';
			$_SESSION['admin']=$crud->validaAdmin($usuario);
			echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=index1.php">
					</head>
				</html>
			';

		}
		else {
			echo "Error al autentificarse";
			
			echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=login.php">
					</head>
				</html>
			 ';

		}
	

	
?>