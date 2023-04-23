<?php
  session_start();
  $clase_aciva=2;
    include_once 'controller/dbconfig.php';
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
					Cumplimiento del cronograma planificado 
					</h3>
					
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN BASIC CHART PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Basic Chart
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_1" class="chart">
							</div>
						</div>
					</div>
					<!-- END BASIC CHART PORTLET-->
					<!-- BEGIN TRACKING CURVES PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Tracking Curves
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_3" class="chart">
							</div>
						</div>
					</div>
					<!-- END TRACKING CURVES PORTLET-->
					<!-- BEGIN DYNAMIC CHART PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Dynamic Chart
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_4" class="chart">
							</div>
						</div>
					</div>
					<!-- END DYNAMIC CHART PORTLET-->
					<!-- BEGIN STACK CHART CONTROLS PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Stack Chart Controls
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_5" style="height:350px;">
							</div>
							<div class="btn-toolbar">
								<div class="btn-group stackControls">
									<input type="button" class="btn blue" value="With stacking"/>
									<input type="button" class="btn red" value="Without stacking"/>
								</div>
								<div class="space5">
								</div>
								<div class="btn-group graphControls">
									<input type="button" class="btn" value="Bars"/>
									<input type="button" class="btn" value="Lines"/>
									<input type="button" class="btn" value="Lines with steps"/>
								</div>
							</div>
						</div>
					</div>
					<!-- END STACK CHART CONTROLS PORTLET-->
					<!-- BEGIN INTERACTIVE CHART PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Interactive Chart
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_2" class="chart">
							</div>
						</div>
					</div>
					<!-- END INTERACTIVE CHART PORTLET-->
					<!-- BEGIN BASIC CHART PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Bar Chart
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_1_1_legendPlaceholder">
							</div>
							<div id="chart_1_1" class="chart">
							</div>
						</div>
					</div>
					<!-- END BASIC CHART PORTLET-->
					<!-- BEGIN BASIC CHART PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Horizontal Bar Chart
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_1_2" class="chart">
							</div>
						</div>
					</div>
					<!-- END BASIC CHART PORTLET-->
				</div>
			</div>
			<!-- END CHART PORTLETS-->
			<div class="row">
				<div class="col-md-12">
				<div class="row">
          <div class="col-lg-8">

          <div id="mensaje"></div>
          <form  role="form" method="post" action="cronograma.php" >
              
                        
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
                    <input type='number' class='form-control' name="annni" id="annni" min="2014" max="2025" value="2015" size ="5">
                  
              </div>
          <div class="col-lg-1">
                <div class="form-group" align="left"> 
                    <button type="submit" class="btn btn-primary btn-sm">
                      <span class="glyphicon glyphicon-search"></span> Buscar
                    </button>
                </div>
              </div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<!-- Esta fila es para ubicar la tabla con los datos-->
				 <div class="col-lg-11">
				    <form   name="formulario" id="formulario" role="form">
				    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
				      <thead >
				        <th width="20">id</th>
				        <th>Resultado planificado</th>
				        <th>Actividad planificada</th>
				        <th>Fecha cump.</th>
				        <th>Estado de ejecucion</th>
				        
				        <th colspan="2" align="center">
				            <a class="btn btn-success btn-sm" href="cronograma_add.php?edit_id=<?php echo $cod; ?>&anno=<?php echo $ani; ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo</a>
				        </th>
				        
				      <thead>
				                 
				       <tbody>
				        <small>
				        

				           <?php
				              //$id =$crud-> idProyecto($cod);
				             //$tot =$crud->totGastConP1($id, $ani);
				              echo "<B>Proyecto:  </B>".$cod.".                      <B> Año: </B>". $ani;
				              
				                $query = " SELECT * FROM  view_actividades_plan 
				                                WHERE project_id = ". $cod ." AND anno = ".$ani.
				                              " ORDER BY provincia";
				 
				                $records_per_page=10;
				                $newquery = $crud->paging($query,$records_per_page);
				                $crud->dataview_cronograma($newquery);

				            ?>
				            </small>
				            <tr>
				              <td colspan="7" align="center">
				              <div class="pagination-wrap">
				                    <?php $crud->paginglink($query,$records_per_page); ?>
				                  </div>
				                </td>
				            </tr>
				         
				       </tbody>
				       <tfoot> 
				      
				      <tr>
				        <td colspan=3 align="right"><B>Total:</B></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>

				      </tr>
				    </tfoot> 
				      </table>
				  </form>   
				    
				  </div>
				  <div class="col-lg-2">
				            
				  </div>
			</div>
			<div class="clearfix">
			</div>
			
			
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<div id="example" class="modal fade">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Cabecera de la ventana</h3>
         </div>
         <div class="modal-body">
            <h4>Texto de la ventana</h4>
            <p>Mas texto en la ventana.</p>                
         </div>
         <div class="modal-footer">
            <a href="#" class="btn btn-success">Guardar</a>
            <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
         </div>
   	</div>
   </div>
</div>
<!-- BEGIN FOOTER -->
	<?php include_once 'footer.php'; ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>