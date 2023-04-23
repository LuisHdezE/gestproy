<?php

	session_start();

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	

	
public function dataview_conceptos($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><small><?php print($row['codigo']); ?></small></td>
              	<td><small><?php print($row['descripcion']); ?></small></td>
                
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td><small>Nada que mostrar...</small></td>
            </tr>
            <?php
		}
		
	}	
	
public function creategastoCon($cod, $anio, $est, $cons, $indesc, $incup, $incuc)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO gastos_concepto_plan (idgastos, idproyecto, anno, estacion, codigo, descripcion, 

importe1, importe2) VALUES(NULL, :icod, :ianio, :iest,:icons, :iindesc, :iincup, :iincuc)");
			$stmt->bindparam(":icod",$cod);
			$stmt->bindparam(":ianio",$anio);
			$stmt->bindparam(":iest",$est);
			$stmt->bindparam(":icons",$cons);
			$stmt->bindparam(":iindesc",$indesc);
			$stmt->bindparam(":iincup",$incup);
			$stmt->bindparam(":iincuc",$incuc);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

public function dataview_gast_c_plan($query)
	{

		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['estacion']); ?></td>
                <td><?php print($row['descripcion']); ?></td>
                <td align="right"><?php print(number_format($row['importe1'],2)); ?></td>
                <td align="right"><?php print(number_format($row['importe2'],2)); ?></td>
                <td align="center">
                <a href="otros_gastos_edit.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                
                <a href="otros_gastos.php?id_del=<?php print($row['id']); ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td><small>Nada que mostrar...</small></td>
            </tr>
            <?php
		}
		
	}	
	
public function dataview_gast_c_real($query)
	{
		include_once 'controller/misVariables.php';
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                
                <td><small><?php print($miProv[$row['provincia']]); ?></small></td>
                <td><small><?php print($miMes[$row['mes']]); ?></small></td>
                <td align="right"><small><?php print(number_format($row['materiales'],2)); ?></small></td>
                <td align="right"><small><?php print(number_format($row['combustible'],2)); ?></small></td>
                <td align="right"><small><?php print(number_format($row['energia'],2)); ?></small></td>
                <td align="right"><small><?php print(number_format($row['salario'],2)); ?></small></td>
                <td align="right"><small><?php print(number_format($row['amortizacion'],2)); ?></small></td>
                <td align="right"><small><?php print(number_format($row['otros'],2)); ?></small></td>
                
                <td align="right"><small><?php print(number_format($row['indirectos'],2)); ?></small></td>
                <td align="center">
                <a href="gastos_real_edit.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                
                <a href="gastos_real.php?id_del=<?php print($row['id']); ?>"><span class="glyphicon glyphicon-trash" aria-

hidden="true"></span></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td><small>Nada que mostrar...</small></td>
            </tr>
            <?php
		}
		
	}	

	public function dataview_gast_m_plan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{

				?>
                <tr>
                <!-- <td><small><?php print($row['idgastos']); ?></small></td> -->
                <td><small><?php print($row['provnombre']); ?></small></td>
                <td><small><?php print($row['tipo']); ?></small></td>
                <td><small><?php print($row['descripcion']); ?></small></td>
                <td><small><?php print($row['um']); ?></small></td>
                <td><small><?php print($row['cantidad']); ?></small></td>
                <td align="right"><small><?php print(number_format($row['importe1'],2)); ?></small></td>
                <td align="right"><small><?php print(number_format($row['importe2'],2)); ?></small></td>
                <td align="center">
                <a href="gastos_mat_edit.php?edit_id=<?php print($row['idgastos']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                
                <a href="gastos_mat.php?id_del=<?php print($row['idgastos']); ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td colspan="8"><small>Nada que mostrar...</small></td>
            </tr>
            <?php
		}
		
	}	

public function createPorciento($cod, $usuario, $anno, $pp)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO porciento_part(id, project_id, anno, user_id, pro_part) VALUES(NULL, :cod, :anno, :usu, :pp)");
			$stmt->bindparam(":cod",$cod);
			$stmt->bindparam(":anno",$anno);
			$stmt->bindparam(":usu",$usuario);
			$stmt->bindparam(":pp",$pp);
			
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	public function createMaterial($cod, $desc, $um, $cup, $cuc)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO materiales(codigo, descripcion, um, precio_cup, precio_cuc) VALUES(:cod1, :desc1, :um1, 

:cup1, :cuc1)");
			$stmt->bindparam(":cod1",$cod);
			$stmt->bindparam(":desc1",$desc);
			$stmt->bindparam(":um1",$um);
			$stmt->bindparam(":cup1",$cup);
			$stmt->bindparam(":cuc1",$cuc);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}


	public function updateMaterial($id,$desc,$um,$cup,$cuc)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE materiales SET descripcion=:desc1, 
		                                               um=:um1, 
													   precio_cup=:pcup, 
													   precio_cuc=:pcuc
													WHERE codigo=:id ");
			$stmt->bindparam(":desc1",$desc);
			$stmt->bindparam(":um1",$um);
			$stmt->bindparam(":pcup",$cup);
			$stmt->bindparam(":pcuc",$cuc);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function createGastoMaterialPlan($idproy1, $anno1, $prov1, $cod1, $descrip1, $um1, $prec1, $prec2, $cant1)
	{
		$imp1 = $cant1*$prec1;	$imp2 = $cant1*$prec2;
		try
		{
			$stmt = $this->db->prepare("INSERT INTO gastos_plan(idgastos, idproyecto, anno, provincia, codigo,  descripcion, um, precio1, 

precio2, cantidad, importe1, importe2) 
											VALUES(NULL, :idproy1, :anno1, :prov1, :cod1, :descrip1, :um1, 

:prec1, :prec2, :cant1, :imp1, :imp2)");
			$stmt->bindparam(":idproy1",$idproy1);
			$stmt->bindparam(":anno1",$anno1);
			$stmt->bindparam(":prov1",$prov1);
			$stmt->bindparam(":cod1",$cod1);
			$stmt->bindparam(":descrip1",$descrip1);
			$stmt->bindparam(":um1",$um1);
			$stmt->bindparam(":prec1",$prec1);
			$stmt->bindparam(":prec2",$prec2);
			$stmt->bindparam(":cant1",$cant1);
			$stmt->bindparam(":imp1",$imp1);
			$stmt->bindparam(":imp2",$imp2);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	//horas plan
	public function updateHorasPlan($idwat,$horas, $importe)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE watchers SET horas=:horas1, importe=:importe1
													WHERE id=:idwat1 ");
			$stmt->bindparam(":horas1",$horas);
			$stmt->bindparam(":importe1",$importe);
			$stmt->bindparam(":idwat1",$idwat);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function updateHorasReal($id,$horas, $importe, $fecha)
	{
		$anio=date("Y", strtotime($fecha)); $ff=date("Y-m-d", strtotime($fecha)); $mes=date("m", strtotime($fecha));
				$semana=date("W", strtotime($fecha)); $ahora=date("Y-m-d");
		$fecha=strtotime($fecha);
		try
		{
			$stmt=$this->db->prepare("UPDATE time_entries 
										SET hours=:horas1, 
										importe=:importe1, tyear=:anio, tmonth=:mes, tweek=:semana, 
										updated_on=:ahora, 
										spent_on=:fecha1
										WHERE id=:id1 ");
			$stmt->bindparam(":horas1",$horas);
			$stmt->bindparam(":importe1",$importe);
			$stmt->bindparam(":anio",$anio);
			$stmt->bindparam(":mes",$mes);
			$stmt->bindparam(":semana",$semana);
			$stmt->bindparam(":ahora",$ahora);
			$stmt->bindparam(":fecha1",$fecha);
			$stmt->bindparam(":id1",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function crearHorasPlan($tarea, $tipo, $idusuario, $horas, $gastoSal)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO watchers(id, watchable_type, watchable_id, user_id, horas, importe) 
										VALUES( 'NULL', :tipo, :tarea, :idusuario, :horas, :gastoSal)");
			$stmt->bindparam(":tarea",$tarea);
			$stmt->bindparam(":tipo",$tipo);
			$stmt->bindparam(":idusuario",$idusuario);
			$stmt->bindparam(":horas",$horas);
			$stmt->bindparam(":gastoSal",$gastoSal);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	public function up_Gas_Sal_Plan($id,$sal)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE watchers SET importe=:sal1
													WHERE id=:id1 ");
			$stmt->bindparam(":sal1",$sal);
			$stmt->bindparam(":id1",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	
	public function crearHorasReal($proy, $tarea, $idusuario, $horas, $activi, $spenton, $gastoSal)
	{								
			$anio=date("Y", strtotime($spenton)); $ff=date("Y-m-d", strtotime($spenton)); $mes=date("m", strtotime($spenton));
				$semana=date("W", strtotime($spenton)); $ahora=date("Y-m-d");
		try
		{
			$stmt = $this->db->prepare("INSERT INTO time_entries(id, project_id, user_id, issue_id, hours, activity_id, tyear, spent_on, tmonth, tweek, created_on, updated_on, importe) 
										VALUES( 'NULL', :proy, :idusuario, :tarea, :horas, :activi, :anio, :ff, :mes, :semana, :ahora, :ahora, :gastoSal)");
			$stmt->bindparam(":proy",$proy);
			$stmt->bindparam(":idusuario",$idusuario);
			$stmt->bindparam(":tarea",$tarea);
			$stmt->bindparam(":horas",$horas);
			$stmt->bindparam(":activi",$activi);
			$stmt->bindparam(":ff",$ff);
			$stmt->bindparam(":anio",$anio);
			$stmt->bindparam(":mes",$mes);
			$stmt->bindparam(":semana",$semana);
			$stmt->bindparam(":ahora",$ahora);
			$stmt->bindparam(":gastoSal",$gastoSal);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	//Actualizar gasto por concepto real
	public function updateGasto_C_Real($id, $mes, $comb)
	{
		$comb=10;
		try
		{
			$stmt=$this->db->prepare("UPDATE control_gastos 
										SET mes=:mes1,
										combustible=comb1
										WHERE id=:id1 ");
			
			$stmt->bindparam(":mes1",$mes);
			//$stmt->bindparam(":mat1",$mat);
			$stmt->bindparam(":comb1",$comb);
			/*$stmt->bindparam(":ener1",$ener);
			$stmt->bindparam(":sal1",$sal);
			$stmt->bindparam(":amor1",$amor);
			$stmt->bindparam(":otros1",$otros);
			$stmt->bindparam(":indi1",$ind);*/
			$stmt->bindparam(":id1",$id);
			$stmt->execute();

			return true;	

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

	}

	//Actualizar gasto por concepto plan
	public function updateGasto_C_Plan($id, $conc1, $cup, $cuc)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE gastos_concepto_plan SET 
														descripcion=:conc1,
														importe1=:cup1,
														importe2=:cuc1
													WHERE idgastos=:id1 ");
			$stmt->bindparam(":conc1",$conc1);
			$stmt->bindparam(":cup1",$cup);
			$stmt->bindparam(":cuc1",$cuc);
			$stmt->bindparam(":id1",$id);
			$stmt->execute();

			return true;	

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

	}

	//Actualizar gasto por concepto plan
	public function updateGasto_M_Plan($id, $prov1, $desc1, $um1, $tipo, $cant1, $prec1, $prec2, $imp1, $imp2)
	{
		
		try
		{
			$stmt=$this->db->prepare("UPDATE gastos_plan 
										SET 
											provincia=:prov1, descripcion=:desc1, um=:um1,
											tipo=:tipo, cantidad=:cant1, precio1=:prec1,
											precio2=:prec2, importe1=:imp1, importe2=:imp2
										WHERE idgastos=:id ");
			$stmt->bindparam(":prov1",$prov1);
			$stmt->bindparam(":desc1",$desc1);
			$stmt->bindparam(":um1",$um1);
			$stmt->bindparam(":tipo",$tipo);
			$stmt->bindparam(":cant1",$cant1);
			$stmt->bindparam(":prec1",$prec1);
			$stmt->bindparam(":prec2",$prec2);
			$stmt->bindparam(":imp1",$imp1);
			$stmt->bindparam(":imp2",$imp2);
			$stmt->bindparam(":id",$id);
			$stmt->execute();

			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

	}
	public function addExperimentos($idProyecto, $clav, $anno, $estac,  $ant, $act, $cep1, $var1, $suelo1, $prot, $cont1, $est1)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO experimentos_vigentes(id, id_proyecto, clave, anno, provincia, cosecha_ant, cosecha_act, 

cepa, variedad, suelo, protocolo_act, continuidad, estado) 
										VALUES( 'NULL', :idProyecto, :estac, :clav, :anno, :ant, :act, :cep1, 

:var1, :suelo1, :prot, :cont1, :est1)");
			$stmt->bindparam(":idProyecto",$idProyecto);
			$stmt->bindparam(":clav",$clav);
			$stmt->bindparam(":anno",$anno);
			$stmt->bindparam(":estac",$estac);
			$stmt->bindparam(":ant",$ant);
			$stmt->bindparam(":act",$act);
			$stmt->bindparam(":cep1",$cep1);
			$stmt->bindparam(":var1",$var1);
			$stmt->bindparam(":suelo1",$suelo1);
			$stmt->bindparam(":prot",$prot);
			$stmt->bindparam(":cont1",$cont1);
			$stmt->bindparam(":est1",$est1);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
									//$id, $clave, $anno, $prov,  $ante, $actu, $cepa, $vari, $suelo, $proto, $conti, $descri)
	public function editExperimentos($id1, $clav, $anno, $estac,  $ant, $act, $cep1, $var1, $suelo1, $prot, $cont1, $est1)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE experimentos_vigentes SET 
											provincia=:estac, clave=:clav, cosecha_ant=:ant,cosecha_act=:act,cepa=:cep1,
											variedad=:var1, suelo=:suelo1,protocolo_act=:prot, 

continuidad=:cont1, estado=:est1
											WHERE id=:id1 ");
			$stmt->bindparam(":estac",$estac);
			$stmt->bindparam(":clav",$clav);
			$stmt->bindparam(":ant",$ant);
			$stmt->bindparam(":act",$act);
			$stmt->bindparam(":cep1",$cep1);
			$stmt->bindparam(":var1",$var1);
			$stmt->bindparam(":suelo1",$suelo1);
			$stmt->bindparam(":prot",$prot);
			$stmt->bindparam(":cont1",$cont1);
			$stmt->bindparam(":est1",$est1);
			$stmt->bindparam(":id1",$id1);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	public function addGasto_C_Plan($proy, $anno, $prov,  $conc1, $descri, $cup, $cuc)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO gastos_concepto_plan(idgastos, idproyecto, anno, estacion, codigo, descripcion, importe1, importe2) 
										VALUES( 'NULL', :proy, :anno, :prov, :conc, :descri, :cup, :cuc)");
			$stmt->bindparam(":proy",$proy);
			$stmt->bindparam(":anno",$anno);
			$stmt->bindparam(":prov",$prov);
			$stmt->bindparam(":conc",$conc1);
			$stmt->bindparam(":descri",$descri);
			$stmt->bindparam(":cup",$cup);
			$stmt->bindparam(":cuc",$cuc);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	public function addGasto_C_Real($proy, $anno, $prov, $mes, $comb, $mat,  $ener, $sal, $amor, $otros, $ind)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO control_gastos(id, id_proyecto, anno, mes, provincia, materiales
										,combustible, energia, salario, amortizacion, otros, indirectos) 
										VALUES( 'NULL', :proy, :anno, :mes, :prov,  :mat, :comb, :ener,
										:sal, :amor, :otros, :ind )");
			$stmt->bindparam(":proy",$proy);
			$stmt->bindparam(":anno",$anno);
			$stmt->bindparam(":mes",$mes);
			$stmt->bindparam(":prov",$prov);
			$stmt->bindparam(":mat",$mat);
			$stmt->bindparam(":comb",$comb);
			$stmt->bindparam(":ener",$ener);
			$stmt->bindparam(":sal",$sal);
			$stmt->bindparam(":amor",$amor);
			$stmt->bindparam(":otros",$otros);
			$stmt->bindparam(":ind",$ind);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	public function addGasto_M_Plan($proy, $anno, $prov, $descri, $um, $tipo, $cant, $prec1, $prec2)
	{
		$imp1 = $cant*$prec1;
        $imp2 = $cant*$prec2;
		try
		{
			$stmt = $this->db->prepare("INSERT INTO gastos_plan(idgastos, idproyecto, anno, provincia,  descripcion, um, precio1, precio2, cantidad, importe1, importe2, tipo) 
										VALUES( 'NULL', :proy, :anno, :prov, :descri, :um, :prec1, :prec2, :cant, :imp1, :imp2, :tipo)");
			$stmt->bindparam(":proy",$proy);
			$stmt->bindparam(":anno",$anno);
			$stmt->bindparam(":prov",$prov);
			$stmt->bindparam(":descri",$descri);
			$stmt->bindparam(":um",$um);
			$stmt->bindparam(":prec1",$prec1);
			$stmt->bindparam(":prec2",$prec2);
			$stmt->bindparam(":cant",$cant);
			$stmt->bindparam(":imp1",$imp1);
			$stmt->bindparam(":imp2",$imp2);
			$stmt->bindparam(":tipo",$tipo);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function addGrupos($cod, $titulo)
	{
		try
		{
				$stmt = $this->db->prepare("INSERT INTO grupos(id, grupo, titulo) 
										VALUES( 'NULL', :cod, :titulo)");
				$stmt->bindparam(":cod",$cod);
				$stmt->bindparam(":titulo",$titulo);
				$stmt->execute();
				return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function comprobarGrupos($cod)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM grupos
										WHERE grupo=:cod");
			$stmt->bindparam(":cod",$cod);
			$stmt->execute();
			$cant=$stmt->rowCount();
			return $cant;
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	//Proedimientos almacenados
	public function actualizaPtos()
	{
		$this->db->exec('call actualiza_puntos();');
		return true;
	}


	public function updateEvalEdit($id, $incid_a, $incid_b, $relev_a,$relev_b, $pp)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE evaluaciones 
										SET incid_a=:incid_a1, incid_b=:incid_b1,
											relev_a=:relev_a1, relev_b=:relev_b1, pp=:pp1
										WHERE id_evaluaciones=:id1 ");
			$stmt->bindparam(":id1",$id);
			$stmt->bindparam(":incid_a1",$incid_a);
			$stmt->bindparam(":incid_b1",$incid_b);
			$stmt->bindparam(":relev_a1",$relev_a);
			$stmt->bindparam(":relev_b1",$relev_b);
			$stmt->bindparam(":pp1",$pp);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function delExperimento($id)
	{
		$stmt = $this->db->prepare("DELETE FROM experimentos_vigentes WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	public function delMateriales($id)
	{
		$stmt = $this->db->prepare("DELETE FROM materiales WHERE codigo=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	public function delGasMatPlan($id)
	{
		$stmt = $this->db->prepare("DELETE FROM gastos_plan WHERE idgastos=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	public function delHorasPlan($id)
	{
		$stmt = $this->db->prepare("DELETE FROM watchers WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	public function delHorasReal($id)
	{
		$stmt = $this->db->prepare("DELETE FROM time_entries WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	public function delConGasPlan($id)
	{
		$stmt = $this->db->prepare("DELETE FROM gastos_concepto_plan WHERE idgastos=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	public function delConGasReal($id)
	{
		$stmt = $this->db->prepare("DELETE FROM control_gastos WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	public function delPorPar($id)
	{
		$stmt = $this->db->prepare("DELETE FROM porciento_part WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	public function delGrupos($id)
	{
		$stmt = $this->db->prepare("DELETE FROM grupos WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}

	public function idProyecto($cod){
		$stmt = $this->db->prepare("SELECT * FROM projects where name=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$id=$row['id'];
			}
	 	return $id;
	 	
	 	}
	}
	
	//devuelve el nombre del proyecto a partir del codigo
	public function nombreProyecto($cod){
		$stmt = $this->db->prepare("SELECT * FROM projects where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombreP=$row['name'];
			}
	 	return $nombreP;
	 	
	 	}
	}
	//devuelve el nombre del jefe de proyecto proyecto a partir del codigo del mismo
	public function nombreJefe($cod){
		$stmt = $this->db->prepare("SELECT * FROM proyectos where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombreP=$row['nombreApe'];
			}
			return $nombreP;

		}
	}
	//devuelve el nombre de la tarea a partir del codigo
	public function nombreTarea($cod){
		$stmt = $this->db->prepare("SELECT * FROM issues where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['subject'];
			}
	 	return $nombre;
	 	
	 	}
	}

	
	//devuelve el nombre de la provincia a partir del codigo

	public function nombreProvincia($cod){
		$stmt = $this->db->prepare("SELECT idprovincias, nombre FROM provincias where idprovincias=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nomb=$row['nombre'];
			}
	 	return $nomb;
	 	
	 	}
	}

	

	//devuelve el codigo de la provincia a partir del nombre
	public function codProvincia($cod){
		$stmt = $this->db->prepare("SELECT idprovincias FROM provincias WHERE nombre=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nomb=$row['idprovincias'];
			}
	 	return $nomb;
	 	
	 	}
	}
		//devuelve el nombre el concepto a partir del codigo
	public function nombreConcepto($cod){
		$stmt = $this->db->prepare("SELECT descripcion FROM conceptos where codigo=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nomb=$row['descripcion'];
			}
	 	return $nomb;
	 	
	 	}
	}

	//devuelve el codigo del concepto a partir del nombre
	public function codConcepto($cod){
		$stmt = $this->db->prepare("SELECT codigo FROM conceptos where descripcion=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nomb=$row['codigo'];
			}
	 	return $nomb;
	 	
	 	}
	}

	
	//devuelve el codigo del material a partir del nombre
	public function codMateriales($cod){
		$stmt = $this->db->prepare("SELECT * FROM codmateriales where descripcion=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$mat=$row;
			}
	 	return $mat;
	 	}
	}



	//devuelve el año de la tarea a partir del codigo

	public function fechaTarea($cod){
		$stmt = $this->db->prepare("SELECT start_date AS fecha FROM issues where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['fecha'];
			}
	 	return $nombre;
	 	
	 	}
	}

	//devuelve el nombre de la tarea a partir del codigo

	public function nombTarea($cod){
		$stmt = $this->db->prepare("SELECT subject FROM issues where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['subject'];
			}
	 	return $nombre;
	 	
	 	}
	}
	//devuelve el tiempo asignado a la tarea a partir del codigo

	public function horasTarea($cod){
		$stmt = $this->db->prepare("SELECT estimated_hours FROM issues where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$horas=$row['estimated_hours'];
			}
	 	return $horas;
	 	
	 	}
	}

	//devuelve el id de proyecto del gasto plan a partir del codigo de esta
	public function codProyectoGastoP($cod){
		$stmt = $this->db->prepare("SELECT idproyecto FROM gastos_concepto_plan where idgastos=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$idproyecto=$row['idproyecto'];
			}
	 	return $idproyecto;
	 	
	 	}
	}

	//devuelve el año de inici del projecto a partir del codigo de este
	public function annoInicio($cod){
		$stmt = $this->db->prepare('SELECT Year(value) as ano FROM custom_values where custom_field_id = "21" and customized_id=:cod');
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombreP=$row['ano'];
			}
	 	return $nombreP;
	 	
	 	}
	 }
	 //Devuelve el total de gastos por concepto de cada proyecto en el año dado
	 public function annoFin($cod){
		$stmt = $this->db->prepare('SELECT Year(value) as ano FROM custom_values where custom_field_id = "22" and customized_id=:cod');
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombreP=$row['ano'];
			}
	 	return $nombreP;
	 	
	 	}

	}

	//Devuelve el total de gastos por concepto de cada proyecto en el año dado
	 public function viewGastosConceptos($query){
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount()>0)
		{
			$k=1;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
	                <tr class="table-row">
	                <td width="10"><small><?php print($k); ?></small></td>
	               <td width="80"><small><?php print($row['provincia']); ?></small></td>
	                <td><small><?php print($row['nombreApe']); ?></small></td>
	                <td width="80"><small><?php print($row['pro_part']); ?></small></td>
	                <td width="40" align="center">
	                	<a href="horas_plan.php?act=&id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>	
	                	<a href="horas_plan.php?del=1&id_del=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-trash"></i></a>
	                </td>
	                </tr> 
	                
                <?php
                $k=$k+1;
			}

		}
		else
		{
			?>
            <tr>
            <td colspan=4><small>Nada hay tareas para mostrar...</small></td>
            </tr>
            <?php
		}

	}
	//devuelve la fila contrl_gatos a partir del id
	public function SelGastoReal($id){
		$stmt = $this->db->prepare("SELECT * FROM control_gastos where id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gast=$row;
			}
	 	return $gast;
	 	
	 	}
	}

	//seleccionar porciento de participa
	//devuelve la fila contrl_gatos a partir del id
	public function SelPorPar($id){
		$stmt = $this->db->prepare("SELECT * FROM view_por_part where id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gast=$row;
			}
	 	return $gast;
	 	
	 	}
	}
	public function codProyectoGastoMP($cod){
		$stmt = $this->db->prepare("SELECT idproyecto FROM gastos_plan where idgastos=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$idproyecto=$row['idproyecto'];
			}
	 	return $idproyecto;
	 	
	 	}
	}

	//devuelve el id de proyecto de la tarea a partir del codigo de esta
	public function codProyectoTarea($cod){
		$stmt = $this->db->prepare("SELECT project_id FROM issues where id=:cod");
		$stmt->bindparam(":cod",$cod);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$idproyecto=$row['project_id'];
			}
	 	return $idproyecto;
	 	
	 	}
	}
	public function totalHoras($id, $anio){
		$stmt = $this->db->prepare("SELECT SUM(estimated_hours) AS total FROM issues where project_id=:id and YEAR(start_date)=:anio");
		$stmt->bindparam(":id",$id);
		$stmt->bindparam(":anio",$anio);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$tot=$row['total'];
			}
	 	return $tot;
	 	
	 	}
	}

	public function totalHorasDet($id){
		$stmt = $this->db->prepare("SELECT SUM(horas) AS total FROM watchers where watchable_id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$tot=$row['total'];
			}
	 	return $tot;
	 	
	 	}
	}

	public function totalSalDet($id){
		$stmt = $this->db->prepare("SELECT SUM(importe) AS total FROM watchers where watchable_id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$tot=$row['total'];
			}
	 	return $tot;
	 	
	 	}
	}
	
	//seleccionar gasto plan
	public function SelGastoPlan($id){
		$stmt = $this->db->prepare("SELECT * FROM gastos_concepto_plan where idgastos=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gast=$row;
			}
	 	return $gast;
	 	
	 	}
	}

	//Devuelve toda la fila del experimento seleccionado segun id
	public function SelExperimento($id){
		$stmt = $this->db->prepare("SELECT * FROM experimentos_vigentes where id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$exp=$row;
			}
	 	return $exp;
	 	
	 	}
	}

//seleccionar gasto materiales plan
	public function SelGastoMPlan($id){
		$stmt = $this->db->prepare("SELECT * FROM gastos_plan where idgastos=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gast=$row;
			}
	 	return $gast;
	 	
	 	}
	}

	//seleccionar gasto materiales plan
	public function SelCodMaterial($descri){
		$stmt = $this->db->prepare("SELECT * FROM codmateriales where descripcion=:descri ");
		$stmt->bindparam(":descri",$descri);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$mat=$row;
			}
	 	return $mat;
	 	
	 	}
	}
	

	public function viewMateriales($query)
	{
		echo $query;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['codigo']); ?></td>
                <td><?php print($row['descripcion']); ?></td>
                <td><?php print($row['um']); ?></td>
                <td><?php print($row['precio_cup']); ?></td>
                <td><?php print($row['precio_cuc']); ?></td>
                <td><?php print($row['tipo']); ?></td>
                <td align="center">
                <a href="edit_materiales.php?edit_id=<?php print($row['codigo']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="del_materiales.php?delete_id=<?php print($row['codigo']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nada que mostrar...</td>
            </tr>
            <?php
		}
		
	}	

public function viewUsuarios($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{	
				if ($row['admin']==1) {
					$adm='x';
				}
				else
				{ $adm='';}
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['nombreApe']); ?></td>
                
                <td><?php print($row['address']); ?></td>
                <td><?php print($adm); ?></td>
                <td align="center">
                <a href="edit_usuarios.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nada que mostrar...</td>
            </tr>
           <?php 
		}
		
	}	


	public function dataview_horas_plan($query)
	{
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				?>
                	<tr>		                               
		                <td><small><?php print($row['estacion']); ?></small></td>
		                <td><small><?php print($row['nombre']." ".$row['apellidos']); ?></small></td>
		                <td align="right"><small><span contenteditable="true" onBlur="saveToDatabase(this,'horas','<?php echo $row['id']; ?>)" onClick="showEdit(this);"> <?php print($row['horas']); ?></span></small></td>
		                <td align="right"><small><?php print($row['importe']); ?></small></td>
		                <td align="center">
		                 <a href="horas_plan_edit.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-floppy-disk"></i></a>
		   
		                </td>
		                <td align="center">
		                    <a href="horas_plan_de.php?tarea=<?php print($_SESSION['tarea']); ?>&del=1&delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-trash"></i></a>
		               </td>
					</tr>
					
                <?php
			} 
		}
		else
		{
			?>
            <tr>
            <td><small>No existen registros relacionados...</small></td>
            </tr>
            <?php
		}
		
	}

	public function dataview_del_horas_plan($query)
	{
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				?>
                	<tr>
		                <td><small><?php print($row['id']); ?></small></td>
		               
		                 <td><small><?php print($row['estacion']); ?></small></td>
		                <td><small><?php print($row['nombre']." ".$row['apellidos']); ?></small></td>
		                
		                <td align="right"><small><?php print($row['horas']); ?></small></td>
		                <td align="right"><small><?php print($row['importe']); ?></small></td>
		                
					</tr>
                <?php

			} 
		}
		else
		{	}
		
	}

	public function SelHorasPlan($id){
		$stmt = $this->db->prepare("SELECT * FROM watchers where id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$horas=$row;
			}
	 	return $horas;
	 	
	 	}
	}

	public function SelUsuaProy($id, $anno, $proy, $mes){
		$stmt = $this->db->prepare("SELECT * FROM time_entries where id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$horas=$row;
			}
	 	return $horas;
	 	
	 	}
	}


	public function SelHorasReal($id){
		$stmt = $this->db->prepare("SELECT * FROM time_entries where id=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$horas=$row;
			}
	 	return $horas;
	 	
	 	}
	}

	//evaluaciones
	public function SelEvaluacion($id){
		$stmt = $this->db->prepare("SELECT * FROM view_evaluacion where id_evaluaciones=:id ");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$eval=$row;
			}
	 	return $eval;
	 	
	 	}
	}
	//termina evaluaciones
	public function dataview_experimentos($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				?>
	            	<tr>
		                <td><small><?php print($row['clave']); ?></small></td>
		                <td><small><?php print($row['provincia']); ?></small></td>
		                <td><small><?php print($this->nombreCepa($row['cepa'])); ?></small></td>
		                <td><small><?php print($this->nombreVariedad($row['variedad'])); ?></small></td>
		                 <td><small><?php 
		                 				$fecha = date_create($row['cosecha_ant']);
	                					echo date_format($fecha, 'd/m/Y');
	                				?>
	                		</small>
	                	</td>
		                <td><small><?php 
		                 				$fecha = date_create($row['cosecha_act']);
	                					echo date_format($fecha, 'd/m/Y');
	                				?>
	                		</small>
	                	</td>
		                <td><small><?php print($row['protocolo_act']); ?></small></td>
		                <td><small><?php print($row['continuidad']); ?></small></td>
		                <td><small><?php print($this->nombreSuelo($row['suelo'])); ?></small></td>
		                <td align="center">
		                 <a href="experimentos_edit.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
		   
		                </td>
		                <td align="center">
		                <a href="experimentos.php?id_del=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
		                </td>
					</tr>
	            <?php
			} 
		}
	}




	public function dataview_resumen_anio_I($query)
	{
		$k=0;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$k =$k+1;
				$puntos=$row['incid_c']+$row['relev_c']+$row['presencia'];
				$pagar=($puntos/100)*60;
				$tot_horas=$row['ene']+$row['feb']+$row['mar']+$row['abr']+$row['may']+$row['jun'];
				$prom_horas=$tot_horas/6;
				if ($row['ene']>0) {$ene=$pagar;} else { $ene=0;}
				if ($row['feb']>0) { $feb=$pagar;} else {$feb=0;}
				if ($row['mar']>0) {$mar=$pagar;} else { $mar=0;}
				if ($row['abr']>0) {$abr=$pagar;} else { $abr=0;}
				if ($row['may']>0) {$may=$pagar;} else { $may=0;}
				if ($row['jun']>0) {$jun=$pagar;} else { $jun=0;}
				$salario=$ene+$feb+$mar+$abr+$may+$jun;
				
				?>
	            	<tr>
		                               
		                <td><small><?php print($row['estacion']); ?></small></td>
		                <td><small><?php print($row['participante']); ?></small></td>
		                <td><small><?php print($jefe); ?></small></td>
		                <td><small><?php print($row['pp']); ?></small></td>
		                <td><small><?php print(number_format($prom_horas,2)); ?></small></td>
		                <td><small><?php print(number_format($tot_horas,2)); ?></small></td>
		                <td><small><?php print(number_format($salario,2)); ?></small></td>
		            </tr>
	            <?php
			} 
		}
	}

	public function dataview_horas_anio_real($query)
	{
		$k=0;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$k =$k+1;
				?>
	            	<tr>
		                <td><small><?php print($k); ?></small></td>

		                <td><small><?php print($row['participante']); ?></small></td>
		                <td><small><?php print($row['estacion']); ?></small></td>
		                <td><small><?php print($row['categoria']); ?></small></td>
		                <td><small><?php print(number_format($row['ene'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['feb'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['mar'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['abr'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['may'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['jun'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['I_sem_prom'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['I_sem'],2)); ?></small></td>

					</tr>
	            <?php
			} 
		}
	}

	public function dataview_sala_anio_I($query)
	{
		$k=0;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$k =$k+1;
				$puntos=$row['incid_c']+$row['relev_c']+$row['presencia'];
				$pagar=($puntos/100)*60;
				
				if ($row['ene']>0) {$ene=$pagar;} else { $ene=0;}
				if ($row['feb']>0) { $feb=$pagar;} else {$feb=0;}
				if ($row['mar']>0) {$mar=$pagar;} else { $mar=0;}
				if ($row['abr']>0) {$abr=$pagar;} else { $abr=0;}
				if ($row['may']>0) {$may=$pagar;} else { $may=0;}
				if ($row['jun']>0) {$jun=$pagar;} else { $jun=0;}
				$salario=$ene+$feb+$mar+$abr+$may+$jun;
				
				?>
	            	<tr>
		                <td><small><?php print($k); ?></small></td>

		                <td><small><?php print($row['participante']); ?></small></td>
		                <td><small><?php print($row['estacion']); ?></small></td>
		                <td><small><?php print($row['Categoria']); ?></small></td>
		                <td><small><?php print(number_format($ene,2)); ?></small></td>
		                <td><small><?php print(number_format($feb,2)); ?></small></td>
		                <td><small><?php print(number_format($mar,2)); ?></small></td>
		                <td><small><?php print(number_format($abr,2)); ?></small></td>
		                <td><small><?php print(number_format($may,2)); ?></small></td>
		                <td><small><?php print(number_format($jun,2)); ?></small></td>
		                <td><small><?php print(number_format($salario,2)); ?></small></td>
		           	</tr>
	            <?php
			} 
		}
	}

	public function dataview_ptos_anio_real($query)
	{
		$k=0;
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$k =$k+1;
				$presencia=$row['horas']/190.6*20;
				$puntos=$presencia+$row['relev_c']+$row['incid_c'];
				$pagar=($puntos/100)*60;
				?>
	            	<tr>
		                <td><small><?php print($k); ?></small></td>

		                <td><small><?php print($row['nombreApe']); ?></small></td>
		                <td><small><?php print($row['estacion']); ?></small></td>
		                <td><small><?php print(number_format($row['incid_a'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['incid_b'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['incid_c'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['relev_a'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['relev_b'],2)); ?></small></td>
		                <td><small><?php print(number_format($row['relev_c'],2)); ?></small></td>
		                <td><small><?php print(number_format($presencia,2)); ?></small></td>
		                <td><small><?php print(number_format($puntos,2)); ?></small></td>
		                <td><small><?php print(number_format($pagar,2)); ?></small></td>
		                <td>
			               <a href="evalua_i_edit.php?id=<?php print($row['id_evaluaciones']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
		                </td>
					</tr>
	            <?php
			} 
		}
	}

	//Porciento de participacion plan
	public function dataview_grupos($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				?>
	            	<tr>
		                <td><small><?php print($row['id']); ?></small></td>
		                <td><small><?php print($row['grupo']); ?></small></td>
		                <td><small><?php print($row['titulo']); ?></small></td>
		                
		                <td align="center">
		                 <a href="grupos.php?editar=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
		   
		                </td>
		                <td align="center">
		                	<a href="grupos.php?borrar=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-trash"></i></a>
		                </td>
					</tr>
	            <?php
			} 
		}
	}

	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;

			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?".$_SESSION['vinc']."&page_no=1'>Inicio</a></li>";
				echo "<li><a href='".$self."?".$_SESSION['vinc']."&page_no=".$previous."'>Anterior</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?".$_SESSION['vinc']."&page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?".$_SESSION['vinc']."&page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?".$_SESSION['vinc']."&page_no=".$next."'>Siguiente</a></li>";
				echo "<li><a href='".$self."?".$_SESSION['vinc']."&page_no=".$total_no_of_pages."'>Ultimo</a></li>";
			}
			?></ul><?php
		}
	}
	//para excel
	public function ListaProyExcel($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			$i = 1;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				 $objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A'.$i, $row['name']);
			      $i++;
			}
		}
	}



	public function ListaProy($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['id']); ?>"><small><?php print($row['name']); ?> </small></option>
                
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>No hay proyectos para listar...</td>
            </tr>
            <?php
		}
		
	}

	public function ListaMat($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		//adiciona linea en blanco
			?>	<option value=""></option> <?php

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option><?php print($row['descripcion']); ?></option>
                
                <?php
			}
		}
	}

	public function ListaProv($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			
			//llenar la lista
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['idprovincias']); ?>"><?php print($row['nombre']); ?></option>
                
                <?php
			}
		}

	}

	public function ListaMes($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{

			//llenar la lista
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['id']); ?>"><?php print($row['nombre_corto']); ?></option>
                
                <?php
			}
		}

	}
	public function ListaCepas($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			
			//llenar la lista
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['codigo']); ?>"><?php print($row['descripcio']); ?></option>
                
                <?php
			}
		}

	}

	public function ListaSuelos($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();


		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['codigo']); ?>"><?php print($row['descripcio']); ?></option>
                
                <?php
			}
		}

	}
	public function ListaVariedades($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['codigo']); ?>"><?php print($row['nombre']); ?></option>
                
                <?php
			}
		}

	}
	public function ListaConceptos($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['codigo']); ?>"><?php print($row['descripcion']); ?></option>
                <?php
			}
		}
		else
		{		}
		
	}
	public function ListaUsuarios($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			?>
				<option value="<?php print(""); ?>"><?php print(""); ?></option>
                
           <?php
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value="<?php print($row['id']); ?>"><?php print($row['firstname']." ".$row['lastname']); ?></option>
                
                <?php
			}
		}
		else
		{}
		
	}
	
	public function ListaActividades($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			//adiciona linea en blanco
			?>	<option value=""></option> <?php

			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option><?php print($row['name']); ?></option>
                
                <?php
			}
		}
		else
		{}
		
	}
	
	//permite obtener el id de usuario a partir del nombre  apellido
	public function idUsuario($nombre){
		$stmt = $this->db->prepare("SELECT * FROM usuarios where nombreApe =:nombre");
		$stmt->bindparam(":nombre",$nombre);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$id=$row['id'];
			}
	 	return $id;
	 	
	 	}
	 	
	 	
	}

	//seleccionar actividad segun codigo
	public function SelActividad($id){
		$stmt = $this->db->prepare("SELECT name FROM enumerations where id=:id");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$result=$row['name'];
			}
	 	return $result;
	 	
	 	}
	}

	//permite obtener el id de la actividad a partir del nombre
	public function idactividad($nombre){
		$stmt = $this->db->prepare("SELECT * FROM enumerations where type='TimeEntryActivity' and name =:nombre");
		$stmt->bindparam(":nombre",$nombre);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$id=$row['id'];
			}
	 	return $id;
	 	
	 	}
	 	
	 	
	}

	//permite obtener el nombre una variedad apartir del codigo
	public function nombreVariedad($cod){
		$stmt = $this->db->prepare("SELECT codigo, nombre FROM variedades where codigo =:cod");
		$stmt->bindparam(":cod",$cod);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['nombre'];
			}
	 	return $nombre;
	 	
	 	}
	 	
	 	
	}

	//permite obtener el nombre una suelo apartir del codigo
	public function nombreSuelo($cod){
		$stmt = $this->db->prepare("SELECT codigo, descripcio FROM suelos where codigo =:cod");
		$stmt->bindparam(":cod",$cod);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['descripcio'];
			}
	 	return $nombre;
	 	
	 	}
	 	
	 	
	}

	//permite obtener el nombre una cepa apartir del codigo
	public function nombreCepa($cod){
		$stmt = $this->db->prepare("SELECT codigo, descripcio FROM cepa where codigo =:cod");
		$stmt->bindparam(":cod",$cod);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['descripcio'];
			}
	 	return $nombre;
	 	
	 	}
	 	
	 	
	}
	public function SelProy($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			//$row=$stmt->fetch(PDO::FETCH_ASSOC);
			//$row=mysql_result($stm, row)
			//$_SESSION['cod']=$row['id'];
			//$codigo=$row['id'];

			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$id=$row['id'];
				//$id=$stmt->rowCount();
			}
	 	return $id;
	 	
			//return $codigo;
		}
		else
		{
			return false;
		}
		
	}


	//Devuelve el salario de un usuario segun el id
	public function SalarioUsuario($usuario)
	{
		$stmt = $this->db->prepare("SELECT custom_values.value AS salario FROM custom_values 
											WHERE custom_field_id=3 AND
										  	customized_type='Principal' AND
										  	customized_id=:id");
		$stmt->bindparam(":id",$usuario);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$sal=round(100*$row['salario']/190.6)/100;
			}
	 	return $sal;
	 	
	 	}
	}

	//permite determinar si a un usuario ya se le asigno tiempo en una tarea determinada
	public function verificaUsuarioTarea($usuario, $tarea){
		$stmt = $this->db->prepare("SELECT * FROM watchers where user_id =:usuario AND watchable_id=:tarea");
		$stmt->bindparam(":usuario",$usuario);
		$stmt->bindparam(":tarea",$tarea);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			$existe=1;
		}
		else
			{
				$existe=2;
			}
		return $existe;
	 	
	 	}


	public function validaUsuario($mlogin, $mpass)
	{
		$mypassword = md5(addslashes($mpass));

		$stmt = $this->db->prepare("SELECT login, m_passwd FROM users WHERE login=:mlogin AND
										  	m_passwd=:mypassword");
		$stmt->bindparam(":mlogin",$mlogin);
		$stmt->bindparam(":mypassword",$mypassword);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{ return 'ok'; }
	 	else 
	 		{ return 'falso';}
	}

	//devuelve admin 1 si el correo pertenece a usuario admin
	public function validaAdmin($login)
	{
		$stmt = $this->db->prepare("SELECT admin FROM users WHERE login=:login");
		$stmt->bindparam(":login",$login);
				
		$stmt->execute();

		return 0;

		if($stmt->rowCount()>0)
		{ 
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$admin=$row['admin'];
			}
			return $admin; 
		}
	 	
	}

	public function provinciaUsuario($id)
	{
		$stmt = $this->db->prepare("SELECT custom_values.value AS provincia FROM custom_values 
											WHERE custom_field_id=1 AND
										  	customized_type='Principal' AND
										  	customized_id=:id");
		$stmt->bindparam(":id",$id);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$prov=$row['provincia'];
			}
	 	return $prov;
	 	
	 	}
	}
	public function nombreUsuario($usuario)
	{
		$stmt = $this->db->prepare("SELECT firstname, lastname FROM users 
											WHERE id=:id");
		$stmt->bindparam(":id",$usuario);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nom=$row['firstname']." ".$row['lastname'];
			}
	 	return $nom;
	 	
	 	}
	}

	public function dataview_horas_tareas_plan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount()>0)
		{

			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
	                <tr class="table-row">
	                <td width="10"><small><?php print($row['id']); ?></small></td>
	                <td><small><?php print($row['subject']); ?></small></td>
	                <td width="80"><small><?php 
	                							$date = date_create($row['start_date']);
	                							echo date_format($date, 'd/m/Y');
	                						?>
	                				</small></td>
	                <td width="40" align="center">
	                	<a href="horas_plan_de.php?tarea=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>	
	                </td>
	                </tr> 
	                
                <?php
			}

		}
		else
		{
			?>
            <tr>
            <td colspan=4><small>Nada hay tareas para mostrar...</small></td>
            </tr>
            <?php
		}
		
	}



//para el real vista detalle
	public function view_horas_tareas_real($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	    
		if($stmt->rowCount()>0)
		{

			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
	                <tr>
	                <td width="10"><small><?php print($row['id']); ?></small></td>
	                <td><small><?php print($row['subject']); ?></small></td>
	                <td width="80"><small><?php 
	                							$date = date_create($row['start_date']);
	                							echo date_format($date, 'd/m/Y');
	                						?>
	                				</small></td>

	                <td width="40"><small><?php print($row['estimated_hours']); ?></small></td>

	                <td width="40" align="center">
	                <a href="horas_real_de.php?tarea=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
	                </td>
	                
                <?php
			}

		}
		else
		{
			?>
            <tr>
            <td colspan=4><small>Nada hay tareas para mostrar...</small></td>
            </tr>
            <?php
		}
		
	}
	public function dataview_horas_tareas_real($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	   
		if($stmt->rowCount()>0)
		{

			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
					//$dd=$crud->SelActividad($row['activity_id']);
				?>
	                <tr>
	                <td class="even"><small><?php print($row['id']); ?></small></td>
	                <td class="even"><small><?php print($row['provincia']); ?></small></td>
	                <td class="even"><small><?php print($row['responsable']); ?></small></td>
	                <td class="even"><span class= "xedit" id="<?php print($row['id']) ?>"><small><?php 
	                				$date = date_create($row['fecha']);
	                				echo date_format($date, 'd/m/Y');
	                				 ?></small></span></td>
	                <td class="even"><span class= "xedit" id="<?php print($row['id']) ?>"><small><?php print($row['actividad']); ?>
	                </small></span></td>
	                <td class="even">
	                		<span class= "xedit" id="<?php print($row['id']) ?>"><small><?php print($row['hours']); ?> 
	                		</small></span></td>
	                <td class="even" align="right">
	                		<small><?php 
                								print("$ ".number_format($row['importe'],2)); 
                							?>
                				</small>
                	</td>
	                
	                <td  align="center">
	                <a href="horas_real_edit.php?id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-save"></i></a>
	                </td>
	                <td align="center">
		                <a href="horas_real_de.php?del=1&delete_id=<?php echo $row['id']; ?>" ><i class="glyphicon glyphicon-trash"></i></a>
		                </td>
	                </tr>

	                
                <?php
			}

		}
		else
		{
			?>
            <tr>
            <td colspan=4><small>Nada hay tareas para mostrar...</small></td>
            </tr>
            <?php
		}
		
	}
	public function viewCodMateriales($query)
	{
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['codigo']); ?></td>
                
                <td><?php print($row['descripcion']); ?></td>
                <td><?php print($row['um']); ?></td>
                <td><?php print($row['precio_cup']); ?></td>
                <td><?php print($row['precio_cuc']); ?></td>
                <td><?php print($row['tipo']); ?></td>
                <td  align="center">
	                <a href="real_horas_edit.php?proy=<?php print($row['project_id']); ?>&anno=<?php print($row['anno']); ?>&tarea=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
	                </td>
	                <td align="center">
		                <a href="real_horas_del.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
		                </td>
	                </tr>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nada que mostrar...</td>
            </tr>
            <?php
		}
		
	}
	//Termina controlador de materials

	public function dataview_gast_sal_plan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				//$ii=nombreUsuario($row['user_id']);
				?>
                <tr>
                <td><small><?php print($row['id']); ?></small></td>
                <td><small><?php print($row['estacion']); ?></small></td>
                <td><small><?php print($row['nombreApe']); ?></small></td>
                
                <td align="right"><small><?php 
                							
                							print("$ ".number_format($row['importe1'],2)); 
                						?>
                				</small>
                </td>
               
                <td align="center">
                <a href="gastos_sal_plan_edit.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                
                <a href="gastos_sal_plan_del.php?delete_id=<?php print($row['id']); ?>"><span class="glyphicon glyphicon-trash" aria-

hidden="true"></span></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td><small>Nada que mostrar...</small></td>
            </tr>
            <?php
		}
		
	}	


	//devuelve el nombre de la tarea a partir del codigo
	public function repoExperimentos($cod, $anno){
		$stmt = $this->db->prepare("SELECT * FROM experimentos_vigentes 
									where anno=:anno AND 
									id_proyecto=:cod
									ORDER BY provincia");
		$stmt->bindparam(":cod",$cod);
		$stmt->bindparam(":anno",$anno);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$nombre=$row['subject'];
			}
	 	return $nombre;
	 	
	 	}
	}
	/* paging */

	//Actualizar gasto salario plan
	public function updateGasto_Sal_Plan($id, $cup)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE gastos_concepto_plan SET 
														
														importe1=:cup1
														
													WHERE idgastos=:id1 ");
			
			$stmt->bindparam(":cup1",$cup);
			$stmt->bindparam(":id1",$id);
			$stmt->execute();

			return true;	

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

	}
	
		public function addGasto_Sal_Plan($est, $proy, $anno, $usua1, $cod11, $descri, $cup)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO gastos_concepto_plan(idgastos, idproyecto, anno, estacion, user_id, codigo, descripcion, importe1) 
										VALUES( 'NULL', :proy, :anno, :est, :usua1, :cod11, :descri, :cup)");
			$stmt->bindparam(":proy",$proy);
			$stmt->bindparam(":anno",$anno);
			$stmt->bindparam(":est",$est);
			$stmt->bindparam(":usua1",$usua1);
			$stmt->bindparam(":cod11",$cod11);
			$stmt->bindparam(":descri",$descri);
			$stmt->bindparam(":cup",$cup);
			
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	public function dataview_cronograma($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><small><?php print($row['id']); ?></small></td>
                <td><small><?php print($row['resultado']); ?></small></td>
                <td><small><?php print($row['actividades']); ?></small></td>
                <td><small><?php print($row['due_date']); ?></small></td>
                
                <td><small><?php print($row['name']); ?></small></td>
                
                <td align="center">
                <a href="gastos_c_real_edit.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                
                <a href="gastos_c_real_del.php?delete_id=<?php print($row['id']); ?>"><span class="glyphicon glyphicon-trash" aria-

hidden="true"></span></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td><small>Nada que mostrar...</small></td>
            </tr>
            <?php
		}
		
	}	

	//Funciones del reporte pte-4
	public function pte4GastosMat($query){
		$stmt = $this->db->prepare($query);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$exp=$row;
			}
	 	return $exp;
	 	
	 	}
	}

	public function aaCup($proy,$anno1)
	{
		$stmt = $this->db->prepare("SELECT sum(importe1) AS salario FROM gastos_plan 
											WHERE 
										  	idproyecto='proy1 AND
										  	anno=:ann1");
		$stmt->bindparam(":proy1",$proy);
		$stmt->bindparam(":ann1",$anno1);
		
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$sal=$row['salario'];
			}
	 	return $sal;
	 	
	 	}
	}


	//devuelve el gasto de materiales segun plan para un concepto dado en un año todos los q no sean equipo pues este es gasto de capital
	public function gastosMatPCUC($anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio2*cantidad) as cuc FROM gastos_plan 
												  where anno=:anno and idproyecto=:proy and tipo<>'Equipos'");
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}

	public function gastosMatPCUP($anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio1*cantidad) as cup FROM gastos_plan 
												  where anno=:anno and idproyecto=:proy and tipo<>'Equipos'");
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cup'];
			}
			return $gasto;
		}
	}

	public function gastosMatEquiPCUC($anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio2*cantidad) as cuc FROM gastos_plan 
												  where anno=:anno and idproyecto=:proy and tipo='Equipos'");
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}

	public function gastosMatEquiPCUP($anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio1*cantidad) as cup FROM gastos_plan 
												  where anno=:anno and idproyecto=:proy and tipo='Equipos'");
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cup'];
			}
			return $gasto;
		}
	}
	public function gastosConceptoPCUP($con,$anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe1) as cup FROM gastos_concepto_plan 
												  where anno=:anno and idproyecto=:proy and codigo=:con");
		$stmt->bindparam(":con",$con);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cup'];
			}
			return $gasto;
		}
	}
	public function gastosConceptoPCUC($con,$anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe2) as cuc FROM gastos_concepto_plan 
												  where anno=:anno and idproyecto=:proy and codigo=:con");
		$stmt->bindparam(":con",$con);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}
	public function gastosOtrosRecPCUC($anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe2) as cuc FROM gastos_concepto_plan 
												  where anno=:anno and idproyecto=:proy 
												  and (codigo=11 OR codigo=12 OR codigo=13 OR codigo=14 OR codigo=17 OR codigo=18)");
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}
	public function gastosOtrosRecPCUP($anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe1) as cup FROM gastos_concepto_plan 
												  where anno=:anno and idproyecto=:proy 
												  and (codigo=11 OR codigo=12 OR codigo=13 OR codigo=14 OR codigo=17 OR codigo=18)");
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cup'];
			}
			return $gasto;
		}
	}

	//Hasta aqui pte4
	//GASTOS PLAN A NIVEL DE TERRITORIOS
	//inveriones en equipos CUP segun plan
	public function gastosMatPTCUP($terr, $anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio1*cantidad) as cuc FROM gastos_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy and tipo<>'Equipos'");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}

	public function gastosMatPTCUC($terr, $anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio2*cantidad) as cuc FROM gastos_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy and tipo<>'Equipos'");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}
//inveriones en equipos CUP segun plan
	public function gastosMatEquiTerrPCUP($terr,$anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio1*cantidad) as cuc FROM gastos_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy and tipo='Equipos'");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}
//inveriones en equipos CUC segun plan
	public function gastosMatEquiTerrPCUC($terr,$anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(precio2*cantidad) as cuc FROM gastos_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy and tipo='Equipos'");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}
	public function gastosConceptoTerrPCUP($terr, $con,$anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe1) as cup FROM gastos_concepto_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy and codigo=:con");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":con",$con);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cup'];
			}
			return $gasto;
		}
	}
	public function gastosConceptoTerrPCUC($terr, $con,$anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe2) as cup FROM gastos_concepto_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy and codigo=:con");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":con",$con);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cup'];
			}
			return $gasto;
		}
	}

	public function gastosOtrosRecTerrPCUP($terr, $anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe1) as cuc FROM gastos_concepto_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy 
                                      and (codigo=11 OR codigo=12 OR codigo=13 OR codigo=14 OR codigo=17 OR codigo=18)");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}

	public function gastosOtrosRecTerrPCUC($terr, $anno, $proy){
		$stmt = $this->db->prepare("SELECT SUM(importe2) as cuc FROM gastos_concepto_plan 
                                      where terr=:terr and anno=:anno and idproyecto=:proy 
                                      and (codigo=11 OR codigo=12 OR codigo=13 OR codigo=14 OR codigo=17 OR codigo=18)");
		$stmt->bindparam(":terr",$terr);
		$stmt->bindparam(":anno",$anno);
		$stmt->bindparam(":proy",$proy);

		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$gasto=$row['cuc'];
			}
			return $gasto;
		}
	}

	
}
