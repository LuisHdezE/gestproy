<?php
  session_start();
    include_once 'controller/dbconfig.php';

    include_once 'controller/activo.php';


    $clase_aciva=3; //permite marcar la opcion del menu activa

    
    if (isset($_POST['mes'])) {
      $mes=$_POST['mes'];
    }
    else
    {
      $mes="Ene";  
    }
    

   if(isset($_GET['id_del']))
		{
			$id = $_GET['id_del'];
			$crud->delConGasReal($id);
		}
 if(isset($_POST['btn-add-gcr']))
    {
        $mat = $_POST['mat'];
        $comb = $_POST['comb'];
        $ener = $_POST['ener'];
        $prov = $_POST['prov'];
        $mes =$_POST['mes'];
        $sal =$_POST['sal'];
        $amor =$_POST['amor'];
        $otros =$_POST['otros'];
        $ind =$_POST['ind'];
	if($crud->addGasto_C_Real($cod, $ani, $prov, $mes,  $comb, $mat, $ener, $sal, $amor, $otros, $ind))
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='gastos_c_plan.php?proy=$nombProyecto&annni=$anno'>Regresar</a>!
                    </div>";
        }
        else
        {
            $msg = "<div class='alert alert-warning'>
                    <strong>Lo sentimos!</strong> ERROR mientras se actualizaba el registro !
                    </div>";
        }
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

			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Gastos por proyectos <small>Real</small>
					</h3>
					<hr>
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
				<div class="col-lg-12">
				    
				    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
				      <thead >
				        <th width="160"><small>Provincia</small></th>
				        <th width="80"><small>Mes</small></th>
				        <th><small>Materiales</small></th>
				        <th><small>Combustible</small></th>
				        <th><small>Energia</small></th>
				        <th><small>Salario</small></th>
				        <th><small>Amortización</small></th>
				        <th><small>Otros gastos</small></th>
				        <th><small>Gastos ind.</small></th>
				        <th colspan="2" align="center">
				                        
				        </th>
				        <tr>
				           <form  method="post" name="formulario" id="formulario" role="form">
				             <td>
				              <select class="form-control input-sm" name="prov" id="prov" >
			          			<option value=""></option>	<!-- adiciona linea en blanco -->
	                              <?php
										$query = "SELECT * FROM provincias";  
	                                    $crud->ListaProv($query);
	                               ?>
			                </select>
				            </td>
				            <td>
				              <select class="form-control input-sm" name="mes" id="mes">
				                  <?php
				                      $query = "SELECT id, nombre_corto FROM mes ORDER BY id";  
				                      $crud->ListaMes($query);
				                 ?>
				              </select>
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="mat">
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="comb">
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="ener">
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="sal">
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="amor">
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="otros">
				            </td>
				            <td>
				              <input type="text" class="form-control input-sm" name="ind">
				            </td>
				            
				            <td colspan="2" align="center">
				              
				              <td colspan="2" align="center">
						                <button type="submit" class="btn btn-success btn-xs" name="btn-add-gcr">
						                        <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar
						                </button>  
						          </td>
				            </td>
				           

				          </form>
				        </tr>
				      </thead>  
				     
				       <tbody>

				           <?php
				              $proyecto =$crud-> nombreProyecto($cod);
				             //$tot =$crud->totGastConP1($id, $ani);
				              echo "<B>Proyecto:  </B>".$proyecto.".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B> Año: </B>". $ani;
				              
				                $query = " SELECT * FROM  control_gastos
				                              
				                              WHERE
				                                id_proyecto = ". $cod ." AND anno = ".$ani.
				                              " ORDER BY provincia";
				 
				                $records_per_page=10;
				                $newquery = $crud->paging($query,$records_per_page);
				                $crud->dataview_gast_c_real($newquery);

				            ?>

				            <tr>
				              <td colspan="12" align="center">
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
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
				        <td colspan=2><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>

				      </tr>
				    </tfoot> 
				      </table>
				 
				    
				  </div>
	
			</div>
	
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
	<?php include_once 'footer.php'; ?>
</body>
<!-- END BODY -->
</html>