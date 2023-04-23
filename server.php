<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "Stop4dogs";
$dbname = "bitnami_redmine";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//define index of column
  $columns = array(
    0 =>'employee_name',   		1 => 'employee_salary',
    2 => 'employee_age',    	3 =>'employee_name', 
    4 => 'incid_a', 			5 => 'incid_b',
    6 =>'employee_name', 		7 => 'relev_a',
    8 => 'relev_b',				9 =>'employee_name', 
    10 => 'employee_salary',	11 => 'employee_age'
  );
  $error = true;
  $colVal = '';
  $colIndex = $rowId = 0;
  
  $msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

  if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && $error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  $error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['id']) && $_POST['id'] > 0 && $error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }
  
    if(!$error) {
        $sql = "UPDATE evaluaciones SET ".$columns[$colIndex]." = '".$colVal."' WHERE id_evaluaciones='".$rowId."'";
        $status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        $msg = array('status' => !$error, 'msg' => 'Success! updation in mysql');
    }
  }
  
  // send data as json format
  echo json_encode($msg);
?>