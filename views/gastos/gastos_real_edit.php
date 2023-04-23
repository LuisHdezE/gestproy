<?php
	session_start();
    include_once 'controller/dbconfig.php';

    include_once 'controller/misVariables.php';
    
    if (isset($_GET['edit_id'])) {
      $id =$_GET['edit_id'];
      
      $fila=$crud->SelGastoReal($id);

      $idProyecto=$fila['id_proyecto'];;
      $nombProyecto=$crud-> nombreProyecto($idProyecto);
      
      $anno = $fila['anno'];
      $prov = $fila['provincia'];
      $mes = $fila['mes'];
      $mat = $fila['materiales'];
      $comb =$fila['combustible'];
      $ener = $fila['energia'];
      $sal = $fila['salario'];
      $amor = $fila['amortizacion'];
      $otros = $fila['otros'];
      $ind = $fila['indirectos'];
    }

    if(isset($_POST['btn-update']))
    {
        $id =$_GET['edit_id'];
        $mes = $_POST['mes'];
        $mat = $_POST['mat'];       
        $comb= $_POST['comb']; 
        $ener= $_POST['ener']; 
        $sal= $_POST['sal']; 
        $amor= $_POST['amor']; 
        $otros= $_POST['otros']; 
        $ind= $_POST['ind']; 
        //if($crud->updateGasto_C_Real1($id, $mes, $mat, $comb, $ener, $sal, $amor, $otros, $ind))
        if($crud->updateGasto_C_Real($id, $mes, $comb))
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='gastos_real.php'>Regresar</a>!
                    </div>";
        }
        else
        {
            $msg = "<div class='alert alert-warning'>
                    <strong>Lo sentimos!</strong> ERROR mientras se actualizaba el registro !$id, $mes, $comb
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
					
					<h3 class="page-header"><span class="glyphicon glyphicon-list"></span> Edicion de Gastos <small>Estación/Mes</small></h3>
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
							<a href="gastos_real.php">
								Gastos
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
				<div class="col-sm-9">
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
				            <td><input type='text' disabled="true" name='id' class='form-control' value="<?php echo $id; ?>" required></td>
				        </tr>
				         <tr>
				            <td colspan="2"><B>Provincia</B><input type='text' disabled="true" name='prov1' class='form-control' value="<?php echo $miProv[$prov]; ?>" required></td>

				          	<td colspan="2"><B>Mes</B>
				            	 <select class="form-control input-sm" id="mes" name="mes">
						            
											<option value="<?php echo $mes; ?>"><?php echo $miMes[$mes]; ?></option>
								             <option value="1">Enero</option>
								              <option value="2">Febrero</option>
								              <option value="3">Marzo</option>
								              <option value="4">Abril</option>
								              <option value="5">Mayo</option>
								              <option value="6">Junio</option>
								              <option value="7">Julio</option>
								              <option value="8">Agosto</option>
								              <option value="9">Septiembre</option>
								              <option value="10">Octubre</option>
								              <option value="11">Noviembre</option>
								              <option value="12">Diciembre</option>
								        </select>
				            </td>
				        </tr>
				        <tr>
				            <td><B>Materiales</B><small><input type='text' name='mat' class='form-control' value="<?php echo number_format($mat,2); ?>"></small></td>
				            <td><B>Combustible</B><input type='text' name='comb' class='form-control' value="<?php echo $comb; ?>"></td>
				            <td><B>Energía</B><input type='text' name='ener' class='form-control' value="<?php echo number_format($ener,2); ?>" ></td>
				            <td><B>Salario</B><input type='text' name='sal' class='form-control' value="<?php echo number_format($sal,2); ?>" ></td>
				        </tr>
				        <tr><td colspan="4"></td></tr>
				        <tr>
				            <td><B>Amortización</B><input type='text' name='amor' class='form-control' value="<?php echo number_format($amor,2); ?>"></td>
				            <td><B>Otros gastos</B><input type='text' name='otros' class='form-control' value="<?php echo number_format($otros,2); ?>"></td>
				            <td><B>Indirectos</B><input type='text' name='ind' class='form-control' value="<?php echo number_format($ind,2); ?>" ></td>
				            <td align="center">
				            	<button type="submit" class="btn btn-primary" name="btn-update">
						          <span class="glyphicon glyphicon-edit"></span> Guardar
						        </button>
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
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
	<?php include_once 'footer.php'; ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>