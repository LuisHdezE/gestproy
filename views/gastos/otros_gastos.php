<?php
  session_start();
    include_once 'controller/dbconfig.php';
    
    include_once 'controller/activo.php';

  if(isset($_POST['btn-add-gc']))
    {
        $cup = round($_POST['cup']*100)/100;
        $cuc = round($_POST['cuc']*100)/100;
        
        $conc1 = $_POST['conc'];
        $descr = $crud->nombreConcepto($_POST['conc']);
        $est = $_POST['prov'];
           

        if($crud->addGasto_C_Plan($cod, $ani, $est, $conc1, $descr, $cup, $cuc))
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

    if(isset($_GET['id_del']))
		{
			$id = $_GET['id_del'];
			$crud->delConGasPlan($id);
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
					Otros gastos <small>Plan</small>
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
					 <hr/>
				</div>			
				</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
				 
				  
				    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
				      <thead >
				        
				        <th> Provincia</th>
				        <th>Concepto de gasto</th>
				        <th>Gasto, CUP</th>
				        <th>Gasto, CUC</th>
				        <th colspan="2" align="center">
				        	<a class="btn btn-danger btn-sm" class="glyphicon glyphicon-print" href='reportes/pte1.php?proy=<?php echo $proye ?>&nomb=<?php echo $cod ?>&ani=<?php echo $ani ?>'><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Imprimir</a>
				        </th>
				        <tr>
						        <form method='post'>
						         
						          	<td><select class="form-control input-sm" name="prov" id="prov" >
						          			<option value=""></option>	<!-- adiciona linea en blanco -->
				                              <?php
													$query = "SELECT * FROM provincias";  
				                                    $crud->ListaProv($query);
				                               ?>
						                </select>
						            </td>
						           
						            <td><select class="form-control input-sm" name="conc" id="conc">
						            			<option value=""></option>
				                                <?php
				                                    $query = "SELECT * FROM conceptos where codigo>'07'";  
				                                    $crud->ListaConceptos($query);
				                               ?>
						                </select>
						            </td>
									
						          	
						          <td><input type='text' class='form-control' name='cup'   id="cup"  required></td>
						          <td><input type='text' class='form-control' name='cuc'   id="cuc"  required></td>
						         
						          <td colspan="2" align="center">
						                <button type="submit" class="btn btn-primary btn-xs" name="btn-add-gc">
						                        <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar
						                </button>  
						          </td>
						        </form>

						      </tr>
				      <thead>
				                 
				       <tbody>
				        <small>
				        

				           <?php
				              //$id =$crud-> idProyecto($cod);
				             //$tot =$crud->totGastConP1($id, $ani);

				              echo "<B>Proyecto:  </B>".$proyecto.".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B> Año: </B>". $ani;
				              
				                $query = " SELECT
				                              gastos_concepto_plan.idgastos AS id, provincias.nombre AS estacion,
				                              gastos_concepto_plan.descripcion, gastos_concepto_plan.importe1,
				                              gastos_concepto_plan.importe2, gastos_concepto_plan.mes
				                              FROM gastos_concepto_plan
				                              INNER JOIN provincias ON provincias.idprovincias = gastos_concepto_plan.estacion
				                              WHERE gastos_concepto_plan.codigo>'07' AND
				                              gastos_concepto_plan.idproyecto = ". $cod ." AND
				                              gastos_concepto_plan.anno = ".$ani.
				                              " ORDER BY provincias.idprovincias, gastos_concepto_plan.codigo";
				 
				                $records_per_page=15;
				                $newquery = $crud->paging($query,$records_per_page);
				                $crud->dataview_gast_c_plan($newquery);

				            ?>
				            </small>
				            <tr>
				              <td colspan="8" align="center">
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
				        <td colspan=2></td>
				      </tr>
				    </tfoot> 
				      </table>
				  
				    
				  </div>
				  <div class="col-lg-2"></div>
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