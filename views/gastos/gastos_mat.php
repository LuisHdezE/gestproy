<?php
  session_start();
    include_once 'controller/dbconfig.php';
  	
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

  $proye=$crud->idProyecto($cod);

  $_SESSION['proy'] = $cod; 
  $_SESSION['anno'] = $ani;

  if(isset($_POST['btn-add-mat']))
    {
        $prov = $_POST['prov1'];
        $desc = $_POST['mat'];
        $cant = $_POST['cant'];
        $fila = $crud-> codMateriales($desc);
        $um = $fila['um'];
        $tipo = $fila['tipo'];
        $prec1 = $fila['precio_cup'];
        $prec2 = $fila['precio_cuc'];
        $crud->addGasto_M_Plan($cod, $ani, $prov, $desc, $um, $tipo, $cant, $prec1, $prec2);
    }

  if(isset($_GET['id_del']))
{
	$id = $_GET['id_del'];
	$crud->delGasMatPlan($id);
}
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
					<span class="glyphicon glyphicon-list"></span> Gastos materiales <small>Plan</small>
					</h3>
					<hr>
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
				<!-- Esta fila es para ubicar la tabla con los datos-->
				<div class="col-md-12">
					 <table class="table table-bordered table-striped table-hover table-condensed" >
					      <thead>
					        <!-- <th width="20"><small>id</small></th> -->
					        <th><small>Provincia</small></th>
					        <th width="40"><small>Tipo</small></th>
					        <th><small>Descripcion</small></th>
					        <th><small>UM</small></th>
					        <th width="140"><small>Cant.</small></th>
					        <th ><small>Importe, CUP</small></th>
					        <th><small>Importe, CUC</small></th></small>
					        
					        <th width="20" colspan="2" align="center">
					          
					        </th>
					        <tr>
						        <form method='post'>
						          <!-- 	<td></td> -->
						          	<td><select class="form-control input-sm" name="prov1" id="prov1" >
						          						<!-- adiciona linea en blanco -->
											<option value=""></option>

				                              <?php
													$query = "SELECT * FROM provincias";  
				                                    $crud->ListaProv($query);
				                               ?>
						                </select>
						            </td>
						          <td></td>
						          	<td><select class="form-control input-sm" name="mat" id="mat">
				                              <?php
				                                    $query = "SELECT * FROM codmateriales";  
				                                    $crud->ListaMat($query);
				                               ?>
					                	</select>
					            	</td>
						          <td></td>
						          <td><input type='text' class='form-control' name='cant'   id="cant"  required></td>
						          <td colspan="2"></td>
						          <td colspan="2" align="center">
						                <button type="submit" class="btn btn-primary btn-xs" name="btn-add-mat">
						                        <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar
						                </button>  
						          </td>
						        </form>

						      </tr>
					      </thead>
					                 
					       <tbody>
					        <small>
					        

					           <?php
					              $nombreproy =$crud-> nombreProyecto($cod);
					              
					             //$tot =$crud->totGastConP1($id, $ani);
					              echo "<B>Proyecto:  </B>". $nombreproy." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <B> Año: </B>". $ani;
					              
					                $query = " SELECT gastos_plan.idgastos, gastos_plan.um, gastos_plan.precio1,
					                                  gastos_plan.precio2, gastos_plan.cantidad, gastos_plan.importe1,
					                                  gastos_plan.importe2, gastos_plan.tipo, gastos_plan.descripcion,
					                                  gastos_plan.provincia, gastos_plan.idproyecto, gastos_plan.anno,
					                                  provincias.nombre AS provnombre
				                                FROM gastos_plan
				                                INNER JOIN provincias ON gastos_plan.provincia = provincias.idprovincias
				                              	WHERE gastos_plan.idproyecto = ". $cod ." AND anno = ".$ani."
				                                ORDER BY  gastos_plan.provincia, tipo";
				 					$records_per_page=10;
					                $newquery = $crud->paging($query,$records_per_page);
					                $crud->dataview_gast_m_plan($newquery);

					            ?>
					            </small>
					            <tr>
					              <td colspan="10" align="center">
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
				<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					

					<!-- END PORTLET-->
				</div>
			</div>
			<div class="clearfix">
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