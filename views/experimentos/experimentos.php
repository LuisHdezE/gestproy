
<?php
  session_start(); 
    include_once 'controller/dbconfig.php';

    include_once 'controller/misVariables.php';
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

 	 if(isset($_GET['id_del']))
		{
			$id = $_GET['id_del'];
			$crud->delExperimento($id);
		}
	if(isset($_POST['btn-add-exper']))
    {
        $clave = $_POST['clave'];
        $estac = $_POST['prov'];
        $ante = $_POST['ante'];
        $actu = $_POST['actu'];
        $cepa = $_POST['cepa'];
        $vari = $_POST['vari'];
        $suelo = $_POST['suelo'];
        $proto = $_POST['proto'];
        $conti = $_POST['conti'];
        $descri = $_POST['descri'];
        
        if($crud->addExperimentos($cod, $ani, $estac, $clave, $ante, $actu, $cepa, $vari, $suelo, $proto, $conti, $descri))
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='experimentos.php?proy=$nombProyecto&annni=$anno'>Regresar</a>!
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
			<!-- END STYLE CUSTOMIZER -->

			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Experimentos vigentes
					</h3>
					
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
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- BEGIN PORTLET-->
					<hr/>
    
			    <table class="table table-bordered table-striped table-hover table-condensed">
			    	<tr>
							<form method='post'>
						          <td>
						              <input type="text" class="form-control input-sm" name="clave" id="clave" required>
						            </td>
						          	<td><select class="form-control input-sm" name="prov" id="prov" >
						          						<!-- adiciona linea en blanco -->
											<option value=""></option>

				                              <?php
													$query = "SELECT * FROM provincias";  
				                                    $crud->ListaProv($query);
				                               ?>
						                </select>
						            </td>
						            <td><select class="form-control input-sm" name="cepa" id="cepa" >
						          						<!-- adiciona linea en blanco -->
											<option value=""></option>

				                              <?php
													$query = "SELECT codigo, descripcio FROM cepa";  
				                                    $crud->ListaCepas($query);
				                               ?>
						                </select>
						            </td>
						          
						          	<td><select class="form-control input-sm" name="vari" id="vari">
				                              <?php
				                                    $query = "SELECT codigo, nombre FROM variedades";  
				                                    $crud->ListaVariedades($query);
				                               ?>
					                	</select>
					            	</td>
						          <td>
						          		<small><input type='date' placeholder="dd/mm/aaaa" class='form-control' name='ante'   id="ante"></small>
									</td>	
									<td>
										<input type='date' placeholder="dd/mm/aaaa" class='form-control' name='actu'   id="actu">
					            	</td>
					            	<td>
					            	 <select class="form-control input-sm" name="proto" id="proto">
						          		<option></option>
						          		<option value="Si">Si</option>
						          		<option value="No">No</option>
										</select> 
					            	</td>
					            	<td>
					            		
					            	<select class="form-control input-sm" name="conti" id="conti">
					            		<option></option>
						          		<option value="Si">Si</option>
						          		<option value="Baja">Baja</option>
						          		<option value="Concluye">Concluye</option>
										</select>
					            	</td>

						          
						          <td colspan="3"><select class="form-control input-sm" name="suelo" id="suelo" >
						          				
				                              <?php
													$query = "SELECT codigo, descripcio FROM suelos";  
				                                    $crud->ListaSuelos($query);
				                               ?>
						                </select>
						            </td>
						          </tr>
						       <tr>  	
						            <td colspan="9">Detalles<input type='text' class='form-control' name='descri'   id="descri"></td>
						        
						           <td colspan="2" align="center">
						                <button type="submit" class="btn btn-success btn-sm" name="btn-add-exper">
						                        <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar
						                </button>  

						          </td>
						        </form>

					</tr><hr>
			      <thead >
			        <th width="140"><small>Clave</small></th>
			        <th width="163"><small>Provincia</small></th>
			        <th><small>Cepa</small></th>
			        <th width="90"><small>Variedad</small></th>
			        <th width="123"><small>Cosecha Anterior</SMALL></th>
			        <th width="123"><small> Cosecha actual</small></th>
			        <th width="60"><small>Prot. act.</small></th>
			        <th><small>Continuidad </small></th>
			        <th colspan="3" align="center" width="30">
			            <small>Suelo </small>
			        </th>
			        <th colspan="2"></th>
			      <thead>
			       <tbody>
			        <small>
			           <?php
			              //$id =$crud-> idProyecto($cod);
			              echo "<B>Proyecto:  </B>".$proyecto;

			            ?>   
			            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B> Año: </B>
			            <?php
			              	echo $ani;
			              
			                $query = "SELECT experimentos_vigentes.id,
			                          experimentos_vigentes.clave,
			                          experimentos_vigentes.cepa,
			                          experimentos_vigentes.variedad,
			                          experimentos_vigentes.protocolo_act,
			                          experimentos_vigentes.continuidad,
			                          experimentos_vigentes.cosecha_ant,
			                          experimentos_vigentes.cosecha_act,
			                          experimentos_vigentes.suelo,
			                          provincias.nombre AS provincia
			                          FROM
			                          experimentos_vigentes
			                          INNER JOIN provincias ON provincias.idprovincias = experimentos_vigentes.provincia
			                          WHERE
			                              experimentos_vigentes.id_proyecto = ". $cod ." AND
			                              anno = ".$ani.
			                              " ORDER BY experimentos_vigentes.provincia";
			 
			                $records_per_page=15;
			                $newquery = $crud->paging($query,$records_per_page);
			                $crud->dataview_experimentos($newquery);
			            ?>
			            </small>
			            <tr>
			              <td colspan="12" align="center">
			              <div class="pagination-wrap">
			                    <?php $crud->paginglink($query,$records_per_page); ?>
			                  </div>
			                </td>
			            </tr>
			       </tbody>
			       
			      </table>
  
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			
			
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
	<?php include_once 'footer.php'; ?>
	<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsPickers.init();
        });   
    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>