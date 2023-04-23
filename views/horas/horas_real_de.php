<?php
  session_start();
    include_once 'controller/dbconfig.php';
    
    $cod=$_SESSION['proyecto'];
    $ani=$_SESSION['anno'];

    if (isset($_GET['tarea'])) {
      $tarea=$_GET['tarea'];
    }
    else
    	{$tarea=$_SESSION['tarea'];}
    
    $_SESSION['tarea']=$tarea;

    if(isset($_POST['btn-add']))
    {
        $idusuario = $_POST['usua1'];
        
        $horas = $_POST['hora1'];
        $gastoSal = $crud->SalarioUsuario($idusuario)*$horas;
        $coment="";

        $acti=$crud->idactividad($_POST['acti']);
        $fecha=$_POST['fecha1']; 
        //$msg =$_POST['proy'];($proy, $tarea, $idusuario, $horas, $activi)
      
       if($crud->crearHorasReal($cod, $tarea, $idusuario, $horas, $acti, $fecha, $gastoSal))
        {
           
            $msg = "<div class='alert alert-info'>
                    <strong>OK!</strong> El registro se actualizo correctamente <a href='real_horas_de.php?proy=$idProyecto&anno=$anno&tarea=$tarea'>Regresar</a>!
                    </div>";
        }
        else
        {
            $msg = "<div class='alert alert-warning'>
                    <strong>Lo sentimos!</strong> ERROR mientras se actualizaba el registro !
                    </div>";
        }
    }
    if(isset($_GET['del']))
    {
        $id = $_GET['delete_id'];
       
        $crud->delHorasReal($id);
         //header("Location: plan_horas_del.php?deleted");
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
					<h3 class="page-title">
					Horas trabajadas por proyecto <small>Tarea</small>
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
							<a href="horas_real.php">
								Horas Trabajadas por tareas
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
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-lg-12">
    
    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
      <thead >
        <th>Id</th>
        <th>Estación</th>
        <th>Responsable</th>
        <th>Fecha</th>
        <th>Actividad</th>
        <th width="40">Horas</th>
        <th>Importe</th>

        <th width="40" align="center"> 
         
        </th>
        <th align="center">
            <a class="btn btn-danger btn-sm" class="glyphicon glyphicon-print" href='reportes/pte1.php?proy=<?php echo $proye ?>&nomb=<?php echo $cod ?>&ani=<?php echo $ani ?>'><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;Imprimir</a>
        </th>
        <tr>
                  <form name="frmDatos" method="post">
                    <td colspan="2">  </td>
                    <td><select class="form-control input-sm" name="usua1" id="usua1">
                                        <?php
                                            $query = "SELECT id, firstname, lastname FROM users";  
                                            $crud->ListaUsuarios($query);
                                       ?>
                        </select>
                    </td>

                    <td><input type='date' name='fecha1' id="fecha1" class='form-control' required></td>
                    <td><select class="form-control input-sm" name="acti" id="acti">
                            <?php
                                  $query = "SELECT name FROM enumerations where type='TimeEntryActivity' order by name";  
                                  $crud->ListaActividades($query);
                             ?>
                        </select>
                    </td>
                    <td><input type='text' name='hora1' class='form-control' required></td>
                    <td colspan="2">  </td>
                    <td colspan="2" align="center">
                          <button type="submit" class="btn btn-success" name="btn-add">
                                <span class="glyphicon glyphicon-plus"></span>  Adicionar
                        </button>
                    
                        </td>
                    
                  </form>
                </tr>
      <thead>
      <tbody>
        <small>
          <?php
             // $id =$crud-> idProyecto($cod);
             //$tot =$crud->totGastConP1($id, $ani);
              $query = "SELECT * FROM view_horas_real
                          WHERE issue_id = ".$tarea;

                $records_per_page=15;
                $newquery = $crud->paging($query,$records_per_page);
                $crud->dataview_horas_tareas_real($newquery);
            ?>
            </small>
            <tr>
              <td colspan="9" align="center">
              <div class="pagination-wrap">
                    <?php $crud->paginglink($query,$records_per_page); ?>
                  </div>
                </td>
            </tr>
         
       </tbody>
       <tfoot> 
      
      <tr>
        <td colspan=5 align="right"><B>Total:</B></td>
        <td colspan=1><label id="lbltotal" name="lbltotal"> <?php echo $tot; ?></label><input type="hidden" name="txtTotal" id="txtTotal" value="0"/></td>
        <td colspan=1 align="right"></td>
        <td colspan=2 align="right"></td>
      </tr>
    </tfoot> 
      </table>
   
    
  </div>
  
</div><!-- /.row -->
				
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