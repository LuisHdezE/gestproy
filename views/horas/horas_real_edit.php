
<?php
	session_start();
    include_once 'controller/dbconfig.php';

	$clase_aciva=2;

	$ani=$_SESSION['anno'];
	$idProyecto=$_SESSION['proyecto'];
    $tarea=$_SESSION['tarea'];
    if (isset($_GET['id'])) {
         $tareaH =$_GET['id'];
    }

    $nombProyecto=$crud-> nombreProyecto($idProyecto);
    
    $fila=$crud->SelHorasReal($tareaH);
    $importe = $fila['importe'];

    $idusuario = $fila['user_id'];
     $usu = $crud->nombreUsuario($fila['user_id']);
     $horas = $fila['hours'];
	 $tarea=$fila['issue_id'];
	$prov = $crud->provinciaUsuario($idusuario);
	$activi=$crud->SelActividad($fila['activity_id']);
    $date1 = date_create($fila['spent_on']);
    $id= $_SESSION['id'];

    if(isset($_POST['btn-update']))
    {
        $id = $tareaH;
        $horas = $_POST['horas1'];
        $importe = $_POST['horas1']*$crud->SalarioUsuario($idusuario);
        $fecha= $_POST['fecha'];
          if($crud->updateHorasReal($id, $horas, $importe, $fecha))
          {
             
              $msg = "<div class='alert alert-info'>
                      <strong>OK!</strong> El registro se actualizo correctamente!
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
					 Edición de horas por proyecto <small>Plan</small>
					</h3>
					<div class="container" class="col-lg-6">
					        <?php
					        if(isset($msg))
					        {
					          echo $msg;
					        }
					        ?>
					    </div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- aqui ubico el formulario de selección -->
					<div id="mensaje"></div>
						    <div class="row">
						              <div class="col-lg-10"><B>
						                &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp; </B>

						                 <?php echo $nombProyecto; ?>
						               
						              </div>
						              <div class="col-lg-2" > <B>
						                 &nbsp;&nbsp;&nbsp;&nbsp;Año:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</B>
						                  <?php echo $ani; ?>
						              </div>
						    </div><!-- /.row -->
						    <br/>
						    <div class="row">
						      
						      <div class="col-lg-9" >
						         <B> &nbsp;&nbsp;&nbsp;&nbsp;Tarea:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</B>
						           
						           <?php
						            $tareaNombre = $crud->nombreTarea($tarea);  
						            echo $tarea." ".$tareaNombre;
						          ?>
						      </div>
						    <div class="col-lg-2">
						      
						      <B> &nbsp;&nbsp;&nbsp;&nbsp;T. estimado:&nbsp;</B>
						      <?php
						            $tiempo = $crud->horasTarea($tarea);  
						            echo $tiempo;
							 	?>
						    </div>
						             
						</div><!-- /.row -->
						<hr/>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-lg-1"> </div>
			    <div class="col-lg-10">
			      <form method='post'>
			        <table class='table table-bordered'>
			            <tr>
			                <td><B>Id</B></td>
			                <td><input type='text' disabled="true" name='tar' class='form-control' value="<?php echo $tareaH; ?>"></td>
			            </tr>
			             <tr>
			                <td><B>Provincia</B></td>
			                <td><input type='text' disabled="true" name='prov1' class='form-control' value="<?php echo $prov; ?>"></td>
			            
			                <td><B>Responsable</B></td>
			                <td><input type='text' disabled="true" name='conc1' class='form-control' value="<?php echo $usu; ?>"></td>
			            </tr>
			            <tr>
			                <td><B>Fecha</B></td>

			               <small>
			               <!-- To-do
			               poner componente de fecha
			               activarlo q esta desactivado
			               verificar por que no guarda la fecha
			                -->
			                <td><input type='text' disabled="true" name='fecha' class='form-control' value="<?php echo date_format($date1, 'd/m/Y');?>">
			                 </td></small>        
			                <td><B>Actividad</B></td>
			               <td><input type='text' disabled="true" name='activ1' class='form-control' value="<?php echo $activi; ?>"></td> 

			            </tr>
			            <tr>
			                <td><B>Horas</B></td>
			                <td><input type='text' name='horas1' class='form-control' value="<?php echo $horas; ?>" required></td>
			            
			                <td><B>Importe, CUP </B></td>
			                <td><input disabled="true" type='text' name='importe1' class='form-control' value="<?php echo $fila['importe']; ?>" ></td>
			            </tr>
			     
			            <tr>
			                <td colspan="2">
			                    <button type="submit" class="btn btn-primary" name="btn-update">
			              <span class="glyphicon glyphicon-edit"></span>  Actualizar este registro
			            </button>
			                    <a href="horas_real_de.php?tarea=<?php print($tarea); ?>" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Regresar</a>
			                </td>
			            </tr>
			        </table>
			      </form>
			</div>

			  <div class="col-lg-1"> </div>
					
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