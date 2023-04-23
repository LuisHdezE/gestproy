<?php
	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "Stop4dogs";
	$DB_name = "bitnami_redmine";

$con = mysql_connect($DB_host,$DB_user,$DB_pass);
mysql_select_db($DB_name,$con);
?>