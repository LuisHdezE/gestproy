<?php
	session_start();
    include_once 'controller/dbconfig.php';

	$ani=$_SESSION['anno'];
	$idProyecto=$_SESSION['proyecto'];
    $tarea=$_SESSION['tarea'];
    
    $nombProyecto=$crud-> nombreProyecto($idProyecto);

    if(isset($_POST['btn-update']))
    {
       $idusuario = $crud->idUsuario($_POST['usua1']);
       $horas = $_POST['hora1'];
       $gastoSal = $crud->SalarioUsuario($idusuario)*$horas;
       $tipo="Issue";
      if ($crud->verificaUsuarioTarea($idusuario, $tarea)==2) 
        {
          if($crud->crearHorasPlan($tarea, $tipo, $idusuario, $horas, $gastoSal))
          {
             $msg = "<div class='alert alert-info'>
                <strong>OK!</strong> El registro se actualizo correctamente <a href='plan_horas_de.php?proy=$idProyecto&anno=$anno&tarea=$tarea'>Regresar</a>!
                      </div>";
          }
          else
          { $msg = "<div class='alert alert-warning'> <strong>Lo sentimos!</strong> ERROR mientras se actualizaba el registro ! </div>"; }
        }
       else
         { $msg = "<div class='alert alert-warning'>  <strong>Lo sentimos!</strong> ERROR El usuario ya existe ! </div>"; } 
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
					Adicionando un nuevo reponsable/horas - <small>Plan</small>
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
							<a href="horas_plan_de.php">
								Horas por proyecto - Plan
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
					<div class="row">
					              <div class="col-lg-9"><B>
					                &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp; </B>
					                 <?php  echo $nombProyecto; ?>
					               
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
					    <br>
					     <div class="container" class="col-lg-6">
					        <?php
					        if(isset($msg))
					        {
					          echo $msg;
					        }
					        ?>
					    </div>
					<div id="mensaje" class="col-lg-6"></div>        
					</div><!-- /.row -->
					<hr>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<!-- Esta fila es para ubicar la tabla con los datos-->
				<div class="col-md-1">
					<!-- BEGIN PORTLET-->

				</div>
				<div class="col-lg-9">
        <form method='post'>
             <table class='table table-bordered '>
                
                 <tr>
                    <td><B>Responsable</B></td>
                    <td><select class="form-control input-sm" name="usua1" id="usua1">
                                        <?php
                                            $query = "SELECT firstname, lastname FROM users";  
                                            $crud->ListaUsuarios($query);
                                       ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><B>Horas</B></td>
                    <td><input type='text' name='hora1' class='form-control'></td>
                </tr>
         
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-update">
                            <span class="glyphicon glyphicon-edit"></span>  Guardar
                        </button>
                        <a href="horas_plan_de.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancelar</a>
                    </td>
                </tr>

            </table>
        </form>
			    </div>
			    <div class="col-lg-2">
			            
			  </div>
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