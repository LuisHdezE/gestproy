<?php
  session_start();
    include_once 'controller/dbconfig.php';
    
    $cod=$_SESSION['proyecto'];
    $ani=$_SESSION['anno'];

    if (isset($_GET['tarea'])) {
      $tarea=$_GET['tarea'];
    }
    
    $_SESSION['tarea']=$tarea;
	include_once 'header.php';

	if(isset($_POST['btn-actualiza']))
    {
        $crud->actualizaPtos();   
    }    
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
					<h3 class="page-title">
					Estimulación del Primer Semestre 
					</h3>
					<hr/>
					
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- aqui ubico el formulario de selección -->
					<div id="mensaje"></div>
						    <div class="row">
						              <div class="col-lg-10"><B>
						                &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp; </B>

						                 <?php
						                    
						                    $proyecto = $crud->nombreProyecto($cod);  
						                    echo $proyecto;
						                  ?>
						               
						              </div>
						              <div class="col-lg-2" > <B>
						                 &nbsp;&nbsp;&nbsp;&nbsp;Año:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</B>
						                  <?php echo $ani; ?>
						              </div>
						    </div><!-- /.row -->
						    <br/>
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
					  	<li role="presentation" class="active"><a href="#resumen" aria-controls="resumen" role="tab" data-toggle="tab">Resumen</a></li>
					    <li role="presentation"><a href="#horas" aria-controls="horas" role="tab" data-toggle="tab">Horas trabajadas</a></li>
					    <li role="presentation"><a href="#puntos" aria-controls="puntos" role="tab" data-toggle="tab">Puntos obtenidos</a></li>
					    <li role="presentation"><a href="#salario" aria-controls="salario" role="tab" data-toggle="tab">Salario devengado</a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="resumen">
					        <div class="row">
					        <div class="col-lg-2"></div>
					    	<div class="col-lg-9">
								<form   name="formulario" id="formulario" role="form" method="POST">
							    <table class="table table-bordered table-striped table-hover table-condensed" id="carrito">
							      <thead >
						      		<th width="90">Provincia</th>
							        <th><small>Nombre y apellidos</small></th>
							        <th width="100"><small>jefe de res.</small></th>
							        <th width="100"><small>%</small></th>
							        <th width="100"><small>Horas/mes</small></th>
							        <th width="100"><small>Horas Trabajadas</small></th>
							        <th width="100"><small>Res. 15</small></th>
							      <thead>
							      <tbody>
					                  <?php
										 $query = "SELECT participante, estacion, categoria, ene, mar, feb, abr,
														 may, jun, incid_c, relev_c, presencia,pp
														FROM horas_salario_I
														WHERE anno=".$ani." AND id_projects = ". $cod;
						                $records_per_page=15;
						                $newquery = $crud->paging($query,$records_per_page);
						                $crud->dataview_resumen_anio_I($newquery);
									?>
					            
				            <tr>
				              <td colspan="11" align="center">
				              <div class="pagination-wrap">
				                    <?php $crud->paginglink($query,$records_per_page); ?>
				                  </div>
				                </td>
				            </tr>
					         
					       </tbody>
					       <tfoot> 
					      
					      <tr>
					        <td colspan=8 align="right"><B>Total:</B></td>
					        <td colspan=2><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
					        
					      </tr>
					    </tfoot> 
					      </table>
					  </form> 
				</div>

					    </div>

					    </div>	<!-- Ttermina el resumen -->
					    <div role="tabpanel" class="tab-pane" id="horas">
					    	<h4>Resumen de horas trabajadas</h4>
					    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- BEGIN PORTLET-->
					<form   name="formulario" id="formulario" role="form" method="POST">
					    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
					      <thead >
					      	
					        <th width="50"><small>No</small></th>
					        <th>Participantes</th>
					        <th width="90"><small>EPICA</small></th>
					        <th width="100"><small>Categ. Cient.</small></th>
					        <th width="100"><small>Ene.</small></th>
					        <th width="100"><small>Feb.</small></th>
					        <th width="100"><small>Mar</small></th>
					        <th width="100"><small>Abr.</small></th>
					        <th width="100"><small>May.</small></th>
					        <th width="100"><small>Jun.</small></th>
					        <th width="100"><small>Horas Prom.</small></th>
					        <th width="100"><small>Horas trab.</small></th>
					        <th width="50" align="center"> 
					          
					        </th>
					      <thead>
					      <tbody>
					        
					          <?php
					             $query = "SELECT participante, estacion, categoria, ene, mar, feb, abr, may, jun, I_sem, I_sem_prom
											FROM horas_tarea_anio_resumen
											WHERE horas_tarea_anio_resumen.tyear=".$ani.
					                                  " AND horas_tarea_anio_resumen.proyecto = ". $cod;
					                $records_per_page=10;
					                $newquery = $crud->paging($query,$records_per_page);
					                $crud->dataview_horas_anio_real($newquery);
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
					    <div role="tabpanel" class="tab-pane" id="puntos">
					    	<div class="row">
					    		<div class="col-lg-8">
					    			<h4>Puntos obtenidos</h4>
					    		</div>
					    		<div class="col-lg-2">
					    		</div>
					    		<div class="col-lg-1">
					    			<form method="post" accept-charset="utf-8">
					    				<button type="submit" class="btn btn-primary" name="btn-actualiza">
					    					<span class="glyphicon glyphicon-edit"></span>  Actualizar
					        			</button>
					    			</form>
					    		</div>
					    		<div class="col-lg-1"></div>
					    	</div>
					    	
					    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					

					<form   name="formulario" id="formulario" role="form" method="POST">
					    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
					      <thead >
					      	
					        <th width="50"><small>No</small></th>
					        <th>Participantes</th>
					        <th width="90"><small>EPICA</small></th>
					        <th width="100" colspan="3"><small>Incidencia</small></th>
					        <th width="100" colspan="3"><small>Relevancia</small></th>
					        <th width="100"><small>Presencia</small></th>
					        <th width="100"><small>Tot. ptos</small></th>
					        <th width="100"><small>A pagar</small></th>
					        
					        <th width="50" align="center"> 
					          
					        </th>
					      </thead>
					      <tbody>
					        
					          <?php
					             $query = "SELECT id_evaluaciones, id_projects, anno, id_user, nombreApe, estacion,
												 incid_a, incid_b, (incid_a/incid_b)*40 as incid_c, relev_a,
												 relev_b, (relev_a/relev_b)*40 as relev_c, horas
												FROM view_evaluacion
					                            WHERE anno=".$ani." AND view_evaluacion.id_projects = ". $cod;
					                $records_per_page=10;
					                $newquery = $crud->paging($query,$records_per_page);
					                $crud->dataview_ptos_anio_real($newquery);
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
					    <div role="tabpanel" class="tab-pane" id="salario">
					    <div class="row">
					    		<div class="col-lg-1">	</div>
					    		<div class="col-lg-8">
					    			<h4>Estimulación devengada</h4>
					    		</div>
								<div class="col-lg-2"></div>
					    </div>
					    <div class="row">
					    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
							<form   name="formulario" id="formulario" role="form" method="POST">
							    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
							      <thead >
					      	
							        <th width="50"><small>No</small></th>
							        <th>Participantes</th>
							        <th width="90"><small>EPICA</small></th>
							        <th width="100"><small>Categ. Cient.</small></th>
							        <th width="100"><small>Ene.</small></th>
							        <th width="100"><small>Feb.</small></th>
							        <th width="100"><small>Mar</small></th>
							        <th width="100"><small>Abr.</small></th>
							        <th width="100"><small>May.</small></th>
							        <th width="100"><small>Jun.</small></th>
							        <th width="100"><small>Total.</small></th>
							        <th width="50" align="center"> 
							       </th>
							      <thead>
							      <tbody>
					        
					          <?php
								 $query = "SELECT participante, estacion, categoria, ene, mar, feb, abr,
												 may, jun, incid_c, relev_c, presencia
												FROM horas_salario_I
												WHERE anno=".$ani." AND id_projects = ". $cod;
				                $records_per_page=15;
				                $newquery = $crud->paging($query,$records_per_page);
				                $crud->dataview_sala_anio_I($newquery);
							?>
					            
				            <tr>
				              <td colspan="11" align="center">
				              <div class="pagination-wrap">
				                    <?php $crud->paginglink($query,$records_per_page); ?>
				                  </div>
				                </td>
				            </tr>
					         
					       </tbody>
					       <tfoot> 
					      
					      <tr>
					        <td colspan=8 align="right"><B>Total:</B></td>
					        <td colspan=2><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
					        
					      </tr>
					    </tfoot> 
					      </table>
					  </form> 
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