<?php
 	session_start();
	session_regenerate_id();
	session_destroy();
 	unset($_SESSION);
	
	echo '
	    <html>
	      <head>
	        <meta http-equiv="REFRESH" content="0;url=index.php">
	      </head>
	    </html>
	';
?> 