<?php
session_start();

class proy
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function getLista($dbTabla)
	{
		
		try
		{
			$query="SELECT * FROM $dbTabla";
			$stmt = $this->db->prepare($query);

			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			//$result= mysql_fetch_array($stmt)

			return $result;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return $false;
		}
	}

	public function contarRegistros($dbTabla)
	{
		$cant=0;
		try
		{
			//echo "string";
			$query="SELECT * FROM $dbTabla";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$cant= $stmt->rowCount();

			return $cant;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return $cant;
		}
	
	}


	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM accion WHERE codigo=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

//Materiales
	public function viewMateriales($query)
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
//----Termina materiales

}

?>
