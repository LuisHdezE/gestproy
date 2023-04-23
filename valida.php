<?php
	session_start();
	if ($_SESSION['validado']!='ok') {
		session_destroy();
	  	 echo '
	    <html>
	      <head>
	        <meta http-equiv="REFRESH" content="0;url=login.php">
	      </head>
	    </html>
	';
	}
?>