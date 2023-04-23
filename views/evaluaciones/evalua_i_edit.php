<?php
  session_start();
    include_once 'controller/dbconfig.php';
    
    $cod=$_SESSION['proyecto'];
    $ani=$_SESSION['anno'];

    if (isset($_GET['id'])) {
      $id=$_GET['id'];
    }
    
    $_SESSION['tarea']=$tarea;

    $fila=$crud->SelEvaluacion($id);
    $particip = $fila['id_user'];
    $incid_a=$fila['incid_a'];
    $incid_b=$fila['incid_b'];
    $pp=$fila['pp'];
    $incid_c=number_format(40*$fila['incid_a']/$fila['incid_b'],2);
    $relev_a=$fila['relev_a'];
    $relev_b=$fila['relev_b'];
    $relev_c=number_format(40*$fila['relev_a']/$fila['relev_b'],2);
	include_once 'header.php';

	if(isset($_POST['btn-eval-update']))
    {
        
        $incid_a = $_POST['incida'];
        $incid_b = $_POST['incidb'];
        $relev_a = $_POST['releva'];
        $relev_b = $_POST['relevb'];
        $pp=$_POST['ppa'];
      	$incid_c=number_format(40*$incid_a/$incid_b,2);
      	$relev_c=number_format(40*$relev_a/$relev_b,2);
        if($crud->updateEvalEdit($id, $incid_a, $incid_b, $relev_a,$relev_b, $pp))
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
					<h3 class="page-title">
					Estimulación del Primer Semestre <small>Editar datos</small>
					</h3>
					<hr/>
					
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- aqui ubico el formulario de selección -->
					<div id="mensaje"></div>
						    <div class="row">
						              <div class="col-lg-10"><B>
						                &nbsp;&nbsp;&nbsp;&nbsp;Proyecto:&nbsp;&nbsp;&nbsp; </B>

						                 <?php
						                    
						                    $proyecto = $crud->nombreProyecto($cod);  
						                    echo $proyecto;
						                  ?>
						               
						              </div>
						              <div class="col-lg-2" > <B>
						                 &nbsp;&nbsp;&nbsp;&nbsp;Año:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</B>
						                  <?php echo $ani; ?>
						              </div>
						    </div><!-- /.row -->
						    <br/>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-lg-3"> </div>
				<div aling="right" class="col-lg-1"> 
					<B>Participante:</B>
				</div>
				<div class="col-lg-8">
					 <?php echo $crud->nombreUsuario($particip); ?>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-3"> </div>
			    <div class="col-lg-5">
			      <form method='post'>
			        <table class='table table-bordered'>
			        	<tr>
			                <td><B>%</B></td>
			                <td><input type='text' name='ppa' class='form-control' value="<?php echo $pp; ?>"></td>
			                <td><input disabled="true" type='text' name='incidb' class='form-control'></td>
			                <td><input disabled="true" type='text' disabled="true" name='tar' class='form-control'></td>
			            </tr>
			            <tr>
			                <td><B>Insidencia</B></td>
			                <td><input type='text' name='incida' class='form-control' value="<?php echo $incid_a; ?>"></td>
			                <td><input type='text' name='incidb' class='form-control' value="<?php echo $incid_b; ?>"></td>
			                <td><input type='text' disabled="true" name='tar' class='form-control' value="<?php echo $incid_c; ?>"></td>
			            </tr>
			             <tr>
			                <td><B>Relevancia</B></td>
			                <td><input type='text' name='releva' class='form-control' value="<?php echo $relev_a; ?>"></td>
				            <td><input type='text' name='relevb' class='form-control' value="<?php echo $relev_b; ?>"></td>
				            <td><input type='text' disabled="true" name='tar' class='form-control' value="<?php echo $relev_c; ?>"></td>
			            </tr>
			            
			            	     
			            <tr>
			                <td colspan="2">
			                    <button type="submit" class="btn btn-primary" name="btn-eval-update" btn-sm>
			              <span class="glyphicon glyphicon-edit"></span>  Actualizar
			            </button>
			            	</td>
			            	<td aling="center" colspan="2">
			                    <a href="evaluaciones_I.php" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Regresar</a>
			                </td>
			            </tr>
			        </table>
			      </form>
			</div>

			  <div class="col-lg-1"> </div>
					
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