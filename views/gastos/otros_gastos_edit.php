<?php
	session_start();
    include_once 'controller/dbconfig.php';
    
    if (isset($_GET['edit_id'])) {
      $gasto =$_GET['edit_id'];
      $idProyecto=$crud-> codProyectoGastoP($gasto);
      $nombProyecto=$crud-> nombreProyecto($idProyecto);

      $fila=$crud->SelGastoPlan($gasto);
      $anno = $fila['anno'];
      $prov = $fila['estacion'];
      $prov1 = $crud-> nombreProvincia($prov);
      $conc = $fila['codigo'];
      $conc1 =$crud->  nombreConcepto($fila['codigo']);
      $cup = $fila['importe1'];
      $cuc = $fila['importe2'];

      $vinculo="proy=".$nombProyecto."&annni=".$anno;
    }

    if(isset($_POST['btn-update']))
    {
        $cup = $_POST['cup1'];
        $cuc = $_POST['cuc1'];

        if($crud->updateGasto_C_Plan($gasto, $conc1, $cup, $cuc))
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='otros_gastos.php?mes=$mes'>Regresar</a>!
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
					
					<h3 class="page-header"><span class="glyphicon glyphicon-list"></span> Edicion de Gastos por conceptos <small>Plan</small></h3>
					<div id="mensaje"></div>

					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">
								Inicio
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="otros_gastos.php">
								Otros Gastos
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
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
          		<div class="col-lg-9">
				<form method='post'>
				     <table class='table table-bordered'>
				        <tr hidden="true">
				            <td><B>Id</B></td>
				            <td><input type='text' disabled="true" name='id' class='form-control' value="<?php echo $gasto; ?>" required></td>
				        </tr>
				         <tr>
				            <td><B>Provincia</B></td>
				            <td><input type='text' disabled="true" name='prov1' class='form-control' value="<?php echo $prov1; ?>" required></td>

				            <td><B>Concepto de gasto</B></td>
				            <td><input type='text' disabled="true" name='conc1' class='form-control' value="<?php echo $conc1; ?>" required></td>
				        </tr>
				        <tr>
				            <td></td>
				            
				        </tr>
				        <tr>
				            <td><B>Gasto, CUP</B></td>
				            <td><input type='text' name='cup1' class='form-control' value="<?php echo $cup; ?>" required></td>
				        
				            <td><B>Gasto, CUC </B></td>
				            <td><input type='text' name='cuc1' class='form-control' value="<?php echo $cuc; ?>" required></td>
				        </tr>
				 
				        <tr>
				            <td colspan="2" align="center">
				                <button type="submit" class="btn btn-primary" name="btn-update">
				          <span class="glyphicon glyphicon-edit"></span> Guardar
				        </button>
				        </td>
				        <td colspan="2" align="center">
				                <a href="gastos_c_plan.php?proy=<?php print($nombProyecto); ?>&annni=<?php print($anno); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancelar</a>
				            </td>
				        </tr>

				    </table>
				</form>
				</div>
				<div class="clearfix"></div><br />
				</div>
			
			
		</div>
	</div>
	<!-- END CONTENT -->
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
	<?php include_once 'footer.php'; ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>