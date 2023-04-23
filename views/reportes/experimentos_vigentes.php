<?php
    session_start();
    include_once '../controller/class.crud.php';
    require('/fpdf/fpdf.php');

    if (isset($_GET['ani'])) {
      $ani=$_GET['ani'];
    }
    if (isset($_GET['proy'])) {
      $cod=$_GET['proy'];
    }

   

class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("logophp.png" , 10 ,8, 35 , 18 , "PNG" ,"http://www.inica.azcuba.cu");
    //Arial bold 15
    $this->SetFont('Arial','B',10);
    //Movernos a la derecha
    $this->Cell(80);

    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(255,255,255);
    $this->SetFillColor(255,255,255);
    //Título
    
    $this->Cell(0,10,'PTE-7. EXPERIMENTOS VIGENTES',0,0,'L');
    $this->Ln(12);
      $this->Cell(0,16,"Proyecto: ".$_GET['nomb'],0,0,'C');
    //Salto de línea
    $this->Ln(20);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    //Cabecera
      $this->Cell(20,5,"Clave",1);
      $this->Cell(34,5,"Fecha de Cosecha",1);
      $this->Cell(30,5,"Cepa",1);
      $this->Cell(17,5,"Variedad",1);
      $this->Cell(40,5,"Tipo de suelo",1);
      $this->Cell(22,5,"Prot. actual.",1);
      $this->Cell(34,5,"Cont. exper",1);
      $this->Cell(60,5,"Estado actual",1);
      $this->Ln();
      $this->Cell(20,5,"",1);
      $this->Cell(17,5,"Anterior",1);
      $this->Cell(17,5,"Actual",1);
      $this->Cell(30,5,"",1);
      $this->Cell(17,5,"",1);
      $this->Cell(40,5,"",1);
      $this->Cell(11,5,"Si",1);
      $this->Cell(11,5,"No",1);
      $this->Cell(6,5,"Si",1);
      $this->Cell(10,5,"Baja",1);
      $this->Cell(18,5,"Concluye",1);
      $this->Cell(60,5,"",1);
      $this->Ln();
      //$anno='2015';
 //$cod='2';
      

    $conexion = mysql_connect("localhost", "root", "Stop4dogs");
    mysql_select_db("bitnami_redmine", $conexion);
    $queEmp = "SELECT * FROM experimentos_vigentes where id_proyecto='".$_GET['proy']."' and anno='".$_GET['ani']."'";
    $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    $this->SetFont('Arial','I',7);
    while ($row = mysql_fetch_assoc($resEmp)) {
          $this->Cell(20,5,$row['clave'],1);
          $this->Cell(17,5,$row['cosecha_ant'],1);
          $this->Cell(17,5,$row['cosecha_act'],1);
          $this->Cell(30,5,$row['cepa'],1);
          $this->Cell(17,5,$row['variedad'],1);
          $this->Cell(40,5,$row['suelo'],1);
          $this->Cell(11,5,$row['protocolo_act'],1);
          $this->Cell(11,5,$row['protocolo_act'],1);
          if ($row['continuidad']=='Si') {
            $this->Cell(6,5,"X",1);
          } else
          {$this->Cell(6,5,"",1);}
          if ($row['continuidad']=='Baja') {
          $this->Cell(10,5,"X",1);
          } else
          {$this->Cell(10,5,"",1);}
          if ($row['continuidad']=='Concluye') {
          $this->Cell(18,5,"X",1);
          } else
          {$this->Cell(18,5,"",1);}
          $this->Cell(60,5,$row['estado'],1);
          $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
   }
  
}

$pdf=new PDF('L','mm','Letter');
//Títulos de las columnas
$header=array('Clave','Anterior','Actual','Cepa', 'Variedad');
  


$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(35);
//$pdf->AddPage();
$pdf->TablaSimple($header);

$pdf->Output();
?>