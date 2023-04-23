<?php
  session_start();
    include_once 'controller/dbconfig.php';
    

    if (isset($_POST['annni'])) {
      $ani=$_POST['annni'];

    }
    
    if (isset($_POST['proy'])) { 
      $proy=$_POST['proy'];

    }
    if (isset($_POST['mes'])) {
      $mes=$_POST['mes'];
    }
    if (isset($_POST['repo'])) {
      $rep=$_POST['repo'];

      $_SESSION['proy'] = $proy; 
      $_SESSION['anno'] = $ani;

      
      $_SESSION['mes'] =$mes;
      
      if ($rep=="1") {echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=pte-1.php" target="_blank">
					</head>
				</html>
				';
		 }
	  if ($rep=="2") {echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=pte-2.php" target="_blank">
					</head>
				</html>
				';
		 }
	if ($rep=="3") {echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=pte-3.php" target="_blank">
					</head>
				</html>
				';
		 }
	if ($rep=="4") {echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=pte-4.php" target="_blank">
					</head>
				</html>
				';
		 }
	if ($rep=="5") {echo '
				<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=pte-5.php" target="_blank">
					</head>
				</html>
				';
		 }
	if ($rep=="7") {echo '
			<html>
				<head>
					<meta http-equiv="REFRESH" content="0;url=pte-7.php" target="_blank">
				</head>
			</html>
			';
	}
    }
  
 // $proye=$crud->idProyecto($cod);

		include_once 'header.php';
	?>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include_once 'menu.php'; ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- BEGIN STYLE CUSTOMIZER -->
					<?php include_once 'config_temas.php'; ?>
			<!-- END STYLE CUSTOMIZER -->

			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title"><span class="glyphicon glyphicon-glyphicon-paste"></span>
					Reportes del sistema 
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">
								Inicio
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Reportes
							</a>
						</li>
						<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span>
								</span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- aqui ubico el formulario de selección -->
					
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<!-- Esta fila es para ubicar la tabla con los datos-->
				<div class="col-sm-12">
	
					<div class="panel panel-info"> 
						<div class="panel-heading"> 
							<h2 class="panel-title">Seleccionar filtro y reportes a mostrar</h2> 
						</div> 
						<div class="panel-body"> 
							<div class="row">
								<div class="col-lg-9">
								
								<form  role="form" method="post" action="reportes.php" >
				    
				              
				                  <B> Proyecto: </B>
				                  <select class="form-control input-sm" name="proy" id="proy">
				                        <?php
				                          $query = "SELECT id, name FROM projects";  
				                          $crud->ListaProy($query);
				                        ?>
				                  </select>
							</div>
							<div class="col-sm-2" align="left"> 
							      <B> Año:</B>
							    		<small> <input type='number' class='form-control' name="annni" id="annni" min="2014" max="2025" value="2015" size ="5"></small>

							    </div>
							  

				    </div><!-- /.row --></br>
				    		<div class="row">
				    
								<div class="col-sm-8">
									<B> Reportes:</B>
							    
							          <select class="form-control input-sm" name="repo" id="repo" >
							             <option value="1">PTE-1. RESULTADOS ESPERADOS Y PRINCIPALES ACTIVIDADES...</option>
							              <option value="2">PTE-2. CRONOGRAMA DE EJECUCION POR PROYECTO</option>
							              <option value="3">PTE-3. PARTICIPANTES EN EL PROYECTO</option>
							              <option value="4">PTE-4. PRESUPUESTO GLOBAL DEL PROYECTO</option>
							              <option value="5">PTE-5. DESCRIPCION DE LOS ELEMENTOS DE GASTO</option>
							              <option value="6">PTE-6. PRESUPUESTO TOTAL POR TERRITORIOS</option>
							              <option value="7">PTE-7. EXPERIMENTOS VIGENTES</option>
							              <option value="8">CTE-1</option>
							              <option value="9">CTE-2</option>
							              
							        </select>
							    </div>

							    <div class="col-sm-2" align="left"> 
							      <B> Mes:</B>
							    
							          <select class="form-control input-sm" name="mes" id="mes" >
							             <option value="1">Enero</option>
							              <option value="2">Febrero</option>
							              <option value="3">Marzo</option>
							              <option value="4">Abril</option>
							              <option value="5">Mayo</option>
							              <option value="6">Junio</option>
							              <option value="7">Julio</option>
							              <option value="8">Agosto</option>
							              <option value="9">Septiembre</option>
							              <option value="10">Octubre</option>
							              <option value="11">Noviembre</option>
							              <option value="12">Diciembre</option>
							        </select>
							    </div>
								
								<div class="col-lg-2">
									<div class="form-group" align="left"> 
							          <button type="submit" class="btn btn-primary btn-sm">
							            <span class="glyphicon glyphicon-search"></span> Mostrar
							          </button>
							      	</div>
								</div>
							</div>

						</form> 

							</div>

							
						</div> 
					</div>
					
					<center><br/><br/><br/>
					
						<br/><br/><br/><br/><br/><br/><br/><br/>
				    <hr/>
				    	<small><B>INICA, 2016</B></small>
				    <hr/>
						
				 </div>
			</div>
	
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
	<?php include_once 'footer.php'; ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>