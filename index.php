<?php
session_start();

$_SESSION['validado'] = 'ok';
if (isset($_SESSION['validado'])) {
	if ($_SESSION['validado'] = 'ok') {
		$usuario = $_SESSION['validado'];
		$_SESSION['admin'];

		echo '
	    <html>
	      <head>
	        <meta http-equiv="REFRESH" content="0;url=views/app.php">
	      </head>
	    </html>
	';
	}
} else {

	echo '
	    <html>
	      <head>
	        <meta http-equiv="REFRESH" content="0;url=./views/users/login.php">
	      </head>
	    </html>
	';
}