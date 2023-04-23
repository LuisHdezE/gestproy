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

  $proyecto=$crud->nombreProyecto($cod);
  $_SESSION['anno']=$ani;
  $_SESSION['proyecto']=$cod;
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
					Horas por proyecto-tareas <small>Real</small>
					</h3>
					
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

					<hr>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			 <div class="row">
					      
			      <div class="col-lg-7" >
				              <B>Proyecto:&nbsp;&nbsp;</B><?php echo $proyecto; ?>
			      </div>
			    <div class="col-lg-2">
			      <B> Año:&nbsp;</B><?php echo $ani; ?>
			    </div>
			    <div class="col-lg-2">
					<!-- Split button -->
					<div class="btn-group">
					  <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> &nbsp;Evaluar</button>
					  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu">
					    <li><a href="evaluaciones_I.php">I Semestre</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="evaluaciones_II.php">II Semestre</a></li>
					   
					  </ul>
					</div>
		
				</div><!-- /.row -->
			<div class="row">

				<!-- Esta fila es para ubicar la tabla con los datos-->
				<div class="col-lg-12">

				    <form   name="formulario" id="formulario" role="form">
				    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
				      <thead >
				        
				        <th width="50"><small>Id</small></th>
				        <th>Tarea</th>
				        <th width="90"><small>Fecha de Inicio</small></th>
				        <th width="100"><small>T. estim., h</small></th>
				        
				        <th width="50" align="center"> 
				          
				        </th>
				      <thead>
				      <tbody>
				        
				          <?php
				             // $id =$crud-> idProyecto($cod);
				             //$tot =$crud->totGastConP1($id, $ani);
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
				                $crud->view_horas_tareas_real($newquery);

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
			<div class="clearfix">
		
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