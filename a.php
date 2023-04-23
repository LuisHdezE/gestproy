<?php 
require 'controller/dbcontroller.php';

    $pk = $_POST['pk']; //primary key aka ID
    $name = $_POST['name']; //name of the field
    $value = $_POST['value']; //value of the field

    if (!empty($value)){
       // $result = mysql_query('update Restaurants set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where r_id = "'.mysql_escape_string($pk).'"');
        print_r($_POST.'aqui');
    	$query="'update evaluaciones set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where r_id = "'.mysql_escape_string($pk).'"'";
    	$DBController->runQuery($query);
    } else {
        header('HTTP 400 Bad Request', true, 400);
        echo "This field is required!";
    }

?>
