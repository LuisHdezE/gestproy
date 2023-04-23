<?php
	session_start();
    include_once 'controller/dbconfig.php';

	$clase_aciva=2;

	$anno=$_SESSION['anno'];
	$idProyecto=$_SESSION['proy'];
	$nombProyecto=$crud-> nombreProyecto($idProyecto);

	if (isset($_GET['edit_id'])) {
      $gasto =$_GET['edit_id'];
      $fila=$crud->SelGastoMPlan($gasto);
      $prov = $fila['provincia'];
      $prov1 = $crud-> nombreProvincia($prov);
      $desc1 = $fila['descripcion'];
      $um1 = $fila['um'];
      $imp1 = $fila['importe1'];
      $imp2 = $fila['importe2'];
      $cant = $fila['cantidad'];
    }

    if(isset($_POST['btn-edit-mat']))
    {
       $desc1 =$_POST['mat'];
       $id =$gasto;
       $cant =$_POST['cant'];
       $fila=$crud->SelCodMaterial($desc1);
       $prec1 = $fila['precio_cup'];
       $prec2 = $fila['precio_cuc'];
        $tipo = $fila['tipo'];
        $um1 = $fila['um'];
        $imp1 = number_format($cant*$prec1,2);
        $imp2 = number_format($cant*$prec2,2);
        $prov =$_POST['prov1'];
        //$prov2 =$crud->codProvincia($prov1);
 
        if($crud->updateGasto_M_Plan($id, $prov, $desc1, $um1, $tipo, $cant, $prec1, $prec2, $imp1,$imp2)) 
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='gastos_m_plan.php?proy=$nombProyecto&annni=$anno'>Regresar</a>!
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
					
					<h3 class="page-title"><span class="glyphicon glyphicon-list"></span>
					 Edicion de Gastos de materiales <small>Plan</small>
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
							<a href="gastos_mat.php">
								Gastos materiales
							</a>
						</li>
						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				          <div class="col-lg-9"><B>
				            &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp;</B>
				            <?php
				              echo $nombProyecto;
				            ?>
				            <br/>
				            </div>
				           <div class="col-lg-3"><B> 
				            &nbsp;&nbsp;&nbsp;&nbsp;Año:&nbsp;&nbsp;&nbsp;</B>
				            <?php
				              echo $anno;
				            ?>
				          </div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="container">
				        <?php
				        if(isset($msg))
				        {
				          echo $msg;
				        }
				        ?>
				    </div>
					<div id="mensaje"></div>
			</div>
				
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-7">
				<form method='post'>
				     <table class='table table-bordered'>
				     	<tr>
				            <td><B>Provincia</B></td>
				            <td><select class="form-control input-sm" name="prov1" id="prov1">
				                              <option value="<?php echo $prov; ?>"> <?php echo $prov1 ?></option>
				            
				                                <?php
				                                    $query = "SELECT * FROM provincias";  
				                                    $crud->ListaProv($query);
				                               ?>
				                </select>
				            </td>
				            <td colspan="2"</td>
				        </tr>
				       
				        <tr>
				            <td width="45" ><B>Descripción</B></td>
				            <td colspan="3"><select class="form-control input-sm" name="mat" id="mat">
				                              <option> <?php echo $desc1 ?></option>
				            
				                                <?php
				                                    $query = "SELECT * FROM codmateriales";  
				                                    $crud->ListaMat($query);
				                               ?>
				                </select>
				            </td>
				        </tr>
				        <tr>
				            <td width="45"><B>Cantidad</B></td>
				            <td><input type='text'  name='cant' class='form-control' value="<?php echo $cant; ?>" ></td>

				            <td width="45"><B>UM</B></td>
				            <td><input type='text' disabled="true" name='um1' class='form-control' value="<?php echo $um1; ?>" ></td>

				        </tr>
				        <tr>
				            <td width="45"><B>Importe, CUP</B></td>
				            <td><input type='text' disabled="true" name='imp1' class='form-control' value="<?php echo $imp1; ?>" ></td>
				        
				            <td><B>Importe, CUC </B></td>
				            <td><input type='text' disabled="true" name='imp2' class='form-control' value="<?php echo $imp2; ?>" ></td>
				        </tr>
				 
				        <tr>
				            <td colspan="2">
				                <button type="submit" class="btn btn-primary" name="btn-edit-mat">
				          <span class="glyphicon glyphicon-edit"></span>  Guardar
				        </button>
				                <a href="gastos_mat.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Regresar</a>
				            </td>
				        </tr>

				    </table>
				</form>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
						
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