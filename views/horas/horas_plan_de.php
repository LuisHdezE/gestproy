<?php
  session_start();
  $clase_aciva=2;
    include_once 'controller/dbconfig.php';
    
    $cod=$_SESSION['proyecto'];
    $ani=$_SESSION['anno'];

    if (isset($_GET['tarea'])) {
      $tarea=$_GET['tarea'];
    }

    
    $_SESSION['tarea']=$tarea;
  
	  if ($ani=="") {
	    $ani=$crud->annoTarea($tarea);
	  }
	  if ($cod=="") {
	    $cod=$crud->proyTarea($tarea);
	  }
	 $vinc='proy='.$cod.'&anno='.$ani.'&tarea='.$tarea;
	 $_SESSION['vinc'] = $vinc;
	 if(isset($_POST['btn-update']))
	    {
	        $idusuario=$_POST['usuario'];

	       $horas = $_POST['horas'];
	        $gastoSal = $crud->SalarioUsuario($idusuario)*$horas;
	        $tipo="Issue";
	      if ($crud->verificaUsuarioTarea($idusuario, $tarea)==2) 
	        {
	          if($crud->crearHorasPlan($tarea, $tipo, $idusuario, $horas, $gastoSal))
	          {
	             $msg = "<div class='alert alert-info' >
	                <strong>OK!</strong> El registro se adiciono correctamente </a>!
	                      </div>";
	          }
	          else
	          { $msg = "<div class='alert alert-warning'> <strong>Lo sentimos!</strong> ERROR mientras se actualizaba el registro ! </div>"; }
	        }
	       else
	         { $msg = "<div class='alert alert-warning'>  <strong>Lo sentimos!</strong> ERROR El usuario ya existe ! </div>"; } 
	    } 

    if(isset($_GET['del']))
    {
        $id = $_GET['delete_id'];
       
        $crud->delHorasPlan($id);
         //header("Location: plan_horas_del.php?deleted");
    }
    include_once 'header.php';
	include_once 'header1.php';
?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php
		include_once 'menu.php';
	?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
						
			<!-- BEGIN STYLE CUSTOMIZER -->
				<?php include_once 'temas.php';	?>
			<div class="row">
				<div class="col-md-12">
					<h2 class="page-header"><span class="glyphicon glyphicon-list"></span> Actualizando Horas por proyecto-tareas - <small>Plan</small></h2>
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
					      
					      <div class="col-lg-10" >
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
			<div class="row">
			  
			  <div class="col-lg-12">
			    <div class="container">
			      <div class="col-lg-6">

			        <?php
			        if(isset($msg))
			        {
			          echo $msg;
			        }
			        ?>
			      </div>
			    </div>
			    <table class="table table-bordered table-striped table-hover table-condensed"    id="carrito">
			      <thead >
			        
			        <th>Estación</th>
			        <th>Responsable</th>
			        <th width="40">Horas</th>
			        <th align="right">Importe</th>
			        <th></th>
				 <tr>
			        <form method='post'>
			          <td></td>
			          <td>
			            <select class="form-control input-sm" name="usuario" id="usuario">
			                            <?php
			                                $query = "SELECT id, firstname, lastname FROM users
			                                          WHERE id IN (SELECT user_id AS id FROM members WHERE project_id=".$cod.")";  
			                                $crud->ListaUsuarios($query);
			                           ?>
			            </select>
			          </td>
			          <td>
			            <input type="text" class="form-control input-sm" name="horas">
			          </td>
			          <td></td>
			          <td align="center">
			                <button type="submit" class="btn btn-primary btn-xs" name="btn-update">
			                        <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar
			                </button>  
			          </td>
			          <td>
			          </td>

			        </form>

			      </tr>
			      <thead>
			      <tbody>
			      <form   name="formulario" id="formulario" role="form">
			        <small>
			          <?php
			             // $id =$crud-> idProyecto($cod);
			             //$tot =$crud->totGastConP1($id, $ani);
			              $query = 
			                  "SELECT
			                      watchers.id as id,
			                      watchers.watchable_id,
			                      users.firstname AS nombre,
			                      users.lastname AS apellidos,
			                      watchers.horas as horas,
			                      watchers.importe,
			                      users.id AS usuario,
			                      custom_values.value as estacion
			                      FROM
			                      users
			                      INNER JOIN watchers ON watchers.user_id = users.id
			                      INNER JOIN custom_values ON custom_values.customized_id = users.id
			                      INNER JOIN provincias ON provincias.nombre = custom_values.value
			                      WHERE
			                      watchers.watchable_type = 'Issue' AND
			                      watchers.watchable_id = ".$tarea." AND
			                      custom_values.customized_type = 'Principal' AND
			                      custom_values.custom_field_id = 1
			                      ORDER BY provincias.idprovincias ASC,custom_values.value, usuario";
			                $records_per_page=25;
			                $newquery = $crud->paging($query,$records_per_page);
			                $crud->dataview_horas_plan($newquery);

			            ?>
			            </small>
			            <tr>
			              <td colspan="7" align="center">
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
			        <td colspan=2 align="right"></td>
			      </tr>
			    </tfoot> 
			    </form> 
			      </table>
			            
			 </div>
			  <div class="col-lg-2">
			            
			  </div>
			</div><!-- /.row -->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
		include_once 'footer.php';
?>

</body>
<!-- END BODY -->
</html>