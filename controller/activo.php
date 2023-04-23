<?php 
	if(isset($_POST['annni'])){
  		$ani=$_POST['annni'];
  		$_SESSION['anno']=$ani;
  	}
  	if(isset($_POST['proy'])){
  		$cod=$_POST['proy'];
  		$_SESSION['proy']=$cod;
  	}

  	$ani=$_SESSION['anno'];
  	$cod=$_SESSION['proy'];
    
    if ($ani==="") { $ani="2016"; }
    if ($cod==="") {
      	$query = "SELECT id FROM projects";  
    	$cod=$crud->SelProy($query);
  	}

  	 $proyecto=$crud->nombreProyecto($cod);
  	$_SESSION['proy'] = $cod; 
 	 $_SESSION['anno'] = $ani;

 	
 ?>