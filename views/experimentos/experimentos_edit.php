<?php
	session_start();
    include_once 'controller/dbconfig.php';
    include_once 'controller/misVariables.php';

     if(isset($_POST['btn-update']))
    {
        $id =$_GET['edit_id'];
        $mes = $_POST['mes'];

     	$cepa = $_POST['cepa'];
	      $vari = $_POST['vari'];		$ante = $_POST['ante'];
	      $actu = $_POST['actu'];		$proto = $_POST['proto'];
	      $conti = $_POST['conti'];		$descri = $_POST['descri'];
	      $suelo = $_POST['suelo'];
       
        if(editExperimentos($id, $clave, $anno, $prov,  $ante, $actu, $cepa, $vari, $suelo, $proto, $conti, $descri))
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='gastos_real.php'>Regresar</a>!
                    </div>";
        }
        else
        {
            $msg = "<div class='alert alert-warning'>
                    <strong>Lo sentimos!</strong> ERROR mientras se actualizaba el registro !
                    </div>";
        }
    }elseif (isset($_GET['edit_id'])) {
    	$id =$_GET['edit_id'];
      
      $fila=$crud->SelExperimento($id);

      $idProyecto=$fila['id_proyecto'];;
      $nombProyecto=$crud-> nombreProyecto($idProyecto);
      
      $anno = $fila['anno'];	    $prov = $fila['provincia'];
      $clave = $fila['clave'];      $cepa = $fila['cepa'];
      $vari = $fila['variedad'];		$ante = $fila['cosecha_ant'];
      $actu = $fila['cosecha_act'];		$proto = $fila['protocolo_act'];
      $conti = $fila['continuidad'];		$descri = $fila['estado'];
      $suelo = $fila['suelo'];
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
					<h3 class="page-title"><span class="glyphicon glyphicon-list"></span>
					Edicion de datos de experimentos 
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
							<a href="experimentos.php">
								Experimentos
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
				<div class="col-lg-1">
					
				</div>
			 <div class="col-lg-9">
			    <form method='post'>
			     <table class='table table-bordered '>
			        <tr>
			           <td><small><B>Clave</B></small><input type='text' name='clav' class='form-control' value="<?php echo $clave ?>"</td>

			            <td><small><B>Provincia</B></small><select class="form-control input-sm" name="prov" id="prov">
			                              <option value="<?php echo $prov ?>"> <?php echo $miProv[$prov]; ?></option>
			            
			                                <?php
			                                    $query = "SELECT * FROM provincias";  
			                                    $crud->ListaProv($query);
			                               ?>
			                </select>
			            </td>
			            <td><small><B>Continuidad</B></small><select class="form-control input-sm" name="conti" id="conti">
			                        <option value="<?php echo $conti ?>"><?php echo $conti; ?></option>
			                        <option value="Si">Si</option>
			                        <option value="Baja">Baja</option>
			                        <option value="Concluye">Concluye</option>
			                </select>
			            </td>
			        </tr>

			        <tr>
			        	<td><small><B>Cepa</B></small><select class="form-control input-sm" name="cepa" id="cepa">
			                                <option value="<?php echo $cepa  ?>"><?php echo $crud->nombreCepa($cepa);?></option>
			                                <?php
			                                    $query = "SELECT codigo, descripcio FROM cepa";  
			                                    $crud->ListaCepas($query);
			                               ?>
			                </select>
			            </td>
			            <td><small><B>Variedad</B></small><select class="form-control input-sm" name="vari" id="vari" >
			                                <option value="<?php echo $vari ?>"><?php echo $crud->nombreVariedad($vari); ?></option>
			                                <?php
			                                    $query = "SELECT codigo, nombre FROM variedades";  
			                                    $crud->ListaVariedades($query);
			                               ?>
			                </select>
			            </td>
			        
			            <td><small><B>Suelo</B></small><select class="form-control input-sm" name="suelo" id="suelo">
			                                <option value="<?php echo $suelo; ?>" ><?php echo  $crud->nombreSuelo($suelo); ?></option>
			                                <?php
			                                    $query = "SELECT codigo, descripcio FROM suelos";  
			                                    $crud->ListaSuelos($query);
			                               ?>
			                </select>
			            </td>
			            
			        </tr>
					<tr>
			            <td><small><B>Cosecha anterior</B></small><input type='text' name='ante' class='form-control' value="<?php $fecha = date_create($ante);
	                					echo date_format($fecha, 'd/m/Y');
			              ?>"</td>

			            <td><small><B>Cosecha actual</B></small><input type='text' name='actu' class='form-control' value="<?php 
			            	$fecha = date_create($actu);
	                					echo date_format($fecha, 'd/m/Y');
			            ?>"</td>
			            <td><small><B>Protocolo actualizado</B></small><select class="form-control input-sm" name="proto" id="proto">
			                      <option value="<?php echo $proto; ?>"><?php echo $proto; ?></option>
			                      <option value="Si">Si</option>
			                        <option value="No">No</option>
			                </select>
			            </td>
			        </tr>  
			         <tr>
			             <td colspan="4"><small> <B>Estado actual</B></small><input type='text' name='descri' rowspan="2" class='form-control' value="<?php echo $descri; ?>"></td>
			            </td>
			        </tr>
			 
			        <tr>
			            <td colspan="2">
			                <button type="submit" class="btn btn-primary" name="btn-update">
			                        <span class="glyphicon glyphicon-edit"></span>  Guardar
			                </button>
			            </td>
			        </tr>

			    </table>
			</form>

			  </div>
			<div class="clearfix">
			</div>
			<div class="row ">
			<!-- Esta fila es para ubicar el pie de pagina-->
				<div class="col-md-6 col-sm-6">
	
				</div>
				<div class="col-md-6 col-sm-6">
					
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