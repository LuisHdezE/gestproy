<?php
  session_start();
    include_once 'controller/dbconfig.php';

    $clase_aciva=2;
    if (isset($_POST['annni'])) {
      $ani=$_POST['annni'];
    }
    else
    {
      $ani="2016";  
    }
    if (isset($_POST['proy'])) {
      $cod=$_POST['proy'];
    }
    else
    {
      $query = "SELECT id FROM projects ORDER BY id Limit 1";  
    $cod=$crud->SelProy($query);
  }
  $_SESSION['vinc'] = "proy=".$cod."&annni=".$ani;
  $proyecto=$crud->nombreProyecto($cod);
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
					<h3 class="page-title">
					Titulo <small>Descripcion</small>
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
								Dashboard
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
					<form  role="form" method="POST">
					    <div class="row">
					          <div class="col-lg-9"><B>
					            &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp; </B>
					            <small>
					            <select class="form-control input-xm" name="proy" id="proy">

					              <?php
					                $query = "SELECT id, name FROM projects";  
					              $crud->ListaProy($query);
					               ?>
					            </select>
					          </div>
					           </small>   
					          <div class="col-lg-2">
					               <B> Año:</B>
					               <small> <input type='number' class='form-control' name="annni" id="annni" min="2014" max="2025" value="2015" size ="5"></small>
					          </div>
					          <div class="col-lg-1">
					            <div class="form-group" align="right">  &nbsp;&nbsp;&nbsp;
					                <button type="submit" class="btn btn-primary btn-sm">
					                  <span class="glyphicon glyphicon-search"></span> Buscar
					                </button>
					            </div>
					          </div>
					    </div><!-- /.row -->
					</form>
					
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<!-- Esta fila es para ubicar la tabla con los datos-->
				<div class="col-md-12">
					<div class="row">
						<div class="col-lg-12">
							<a href="add_materiales.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Adicionar material</a>
						</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12">
							<table class='table table-bordered table-responsive'>
							     <tr>
							     <th>Tipo</th>
							     <th>Descripci&oacuten</th>
							     <th>UM</th>
							     <th>Precio, CUP</th>
							     <th>Precio, CUC</th>
							     <th colspan="2" align="center">Acciones</th>
							     </tr>

							     <?php

									$query = "SELECT * FROM codmateriales order by tipo";       
									$records_per_page=15;

									$newquery = $crud->paging($query,$records_per_page);
									
									$crud->viewCodMateriales($newquery);
								 ?>
							    <tr>
							        <td colspan="7" align="center">
							 			<div class="pagination-wrap">
							            <?php $crud->paginglink($query,$records_per_page); ?>
							        	</div>
							        </td>
							    </tr>
							 
							</table>
					</div>
				</div>

				</div>

			</div>
			<div class="clearfix">
			</div>
			<div class="row ">
			<!-- Esta fila es para ubicar el pie de pagina-->
				
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