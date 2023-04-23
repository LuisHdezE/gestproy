<?php
  session_start();
    include_once 'controller/dbconfig.php';
    $clase_aciva=2;
    
    if (isset($_POST['proy'])) {
      $_SESSION['proyecto']=$_POST['proy'];
    }
    if (isset($_POST['anio'])) {
      $_SESSION['anno']=$_POST['anio'];
    }

    $cod=$_SESSION['proyecto'];
    $ani=$_SESSION['anno'];
    
    if ($ani<2000) {
      $ani=2016;
    }
    
    if (isset($_POST['mes'])) {
      $mes=$_POST['mes'];
    }
    else
    { $mes="Ene"; }
       
    if ($cod==""){
      	$query = "SELECT id FROM projects";  
    	$cod=$crud->SelProy($query);

 	}

 	if(isset($_GET['id_del']))
		{
			
			$id = $_GET['id_del'];
			$crud->delPorPar($id);
		}
 	//para el formulario de actualizacion
 	if(isset($_POST['btn-guarda'])) {
      $usuario=$_POST['usuario'];
      $pp=$_POST['pp'];
      $fila=$crud->createPorciento($cod, $usuario, $ani, $pp);
      $nombre=$fila['nombreApe'];
      $pp=$fila['pro_part'];

    }



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
					Horas por proyecto-tareas <small>Plan</small>
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
								Horas plan
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
					<form  role="form" method="POST">
					    <div class="row">
					          <div class="col-lg-9"><B>
					            &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp; </B>
					            <select class="form-control input-xm" name="proy" id="proy">

					              <?php
					                $query = "SELECT id, name FROM projects";  
					              $crud->ListaProy($query);
					               ?>
					            </select>
					          </div>
					              
					          <div class="col-lg-2">
					               <B> Año:</B>
					               <small> <input type='number' class='form-control' name="anio" id="anio" min="2014" max="2025" value="2015" size ="5"></small>
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
					<div>
					  <ul class="nav nav-tabs" role="tablist">
					  	<!-- <li role="presentation"><a href="#resumen" aria-controls="resumen" role="tab" data-toggle="tab">Tareas</a></li> -->
					    <li role="presentation" class="active"><a href="#horas" aria-controls="horas" role="tab" data-toggle="tab">Horas/tareas</a></li>
					    <li role="presentation"><a href="#puntos" aria-controls="puntos" role="tab" data-toggle="tab">% de participación</a></li>
					    
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    
					    <div role="tabpanel" class="tab-pane active" id="horas">
			
					    	<div class="row">
				<!-- Esta fila es para ubicar la tabla con los datos-->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- BEGIN PORTLET-->
					<form   name="formulario" id="formulario" role="form" method="POST">
					    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
					      <thead >
					      	
					        <th width="50"><small>Id</small></th>
					        <th>Tarea</th>
					        <th width="90"><small>Fecha de Inicio</small></th>
					        <th width="100"><small>T. estim., h</small></th>
					        
					        <th width="50" align="center"> 
					          <a class="btn btn-danger btn-sm" class="glyphicon glyphicon-print" href='reportes/pte1.php?proy=<?php echo $proye ?>&nomb=<?php echo $cod ?>&ani=<?php echo $ani ?>'><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Imprimir</a>
					        </th>
					      <thead>
					      <tbody>
					        
					          <?php
					             // $id =$crud-> idProyecto($cod);
					             //$tot =$crud->totGastConP1($id, $ani);
					              echo "<B>Proyecto:  </B>".$proyecto.".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B> Año: </B>". $ani;
					              
					                $query = "SELECT
					                            projects.area,
					                            issues.project_id as project_id,
					                            issues.id as id,
					                            YEAR(issues.start_date) as anno,
					                            issues.subject as subject,
					                            issues.start_date as start_date,
					                            issues.estimated_hours as estimated_hours
					                            FROM
					                              projects
					                            INNER JOIN issues ON issues.project_id = projects.id
					                            WHERE YEAR(start_date)=".$ani.
					                                  " AND issues.parent_id IS NOT NULL
					                                   AND project_id = ". $cod ." 
					                            ORDER BY
					                                  projects.area ASC,
					                                  issues.project_id ASC,
					                                  issues.start_date ASC";
					                $records_per_page=10;
					                $newquery = $crud->paging($query,$records_per_page);
					                $crud->dataview_horas_tareas_plan($newquery);


					            ?>
					            
					            <tr>
					              <td colspan="6" align="center">
					              <div class="pagination-wrap">
					                    <?php $crud->paginglink($query,$records_per_page); ?>
					                  </div>
					                </td>
					            </tr>
					         
					       </tbody>
					       <tfoot> 
					      
					      <tr>
					        <td colspan=3 align="right"><B>Total:</B></td>
					        <td colspan=2><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
					        
					      </tr>
					    </tfoot> 
					      </table>
					  </form> 
				</div>

		</div>
					    	
					    </div>
					    <div role="tabpanel" class="tab-pane" id="puntos">
					    	
					    	<div class="row">
					    	<form method="post" accept-charset="utf-8">
					    	
					    	<div class="col-lg-1"></div>
					    	<div class="col-lg-7">
					    	<br>
								
					    <table class="table table-bordered table-striped table-hover table-condensed">
					      <thead >
					      	
					        <th width="50"><small>No</small></th>
					        <th width="90"><small>EPICA</small></th>
					        <th><small>Participantes</small></th>
					        
					        <th width="100"><small>% part.</small></th>
					        <th width="50" align="center"> </th>
					      </thead>
					      <tbody>
					        
					          <?php
					             $query = "SELECT id, project_id, provincia, user_id, nombreApe, pro_part 
					             			FROM view_por_part
					             			WHERE  anno=".$ani." AND  project_id = ". $cod;
					                $records_per_page=10;
					                $newquery = $crud->paging($query,$records_per_page);
					                $crud->viewGastosConceptos($newquery);
					            ?>
					            
					            <tr>
					              <td colspan="6" align="center">
					              <div class="pagination-wrap">
					                    <?php $crud->paginglink($query,$records_per_page); ?>
					                  </div>
					                </td>
					            </tr>
					       </tbody>
					       <tfoot> 
					      </tfoot> 
					      </table>
					  
					    </div>
					    <div class="col-lg-4">
					    <br>
					    	<form method="post" accept-charset="utf-8">
							    
					            <small><B> Nombre y apellidos:</B></small>
					            <select class="form-control input-sm" name="usuario" id="usuario">
			                            <?php
			                                $query = "SELECT id, firstname, lastname FROM users
			                                          WHERE id IN (SELECT user_id AS id FROM members WHERE project_id=".$cod.")";  
			                                $crud->ListaUsuarios($query);
			                           ?>
			            		</select>
					            <div class="row">
					            	<div class="col-lg-4">
					            		<small><B> % part:</B></small>
					            		<small> <input type='number' class='form-control' name="pp" id="pp" min="0" max="100" value="<?php $pp; ?>"></small>
					            	</div>
					            	<div class="col-lg-2">
					            	<br>
					            		<button type="submit" class="btn btn-success" name="btn-guarda">
					    					<span class="glyphicon glyphicon-edit"></span>  Guardar
					        			</button>
					    			</form>
					            	</div>
					            </div>
					            
					    	</form>
					    </div>
					    </div>
					</div>
					    </div>
				</div>
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