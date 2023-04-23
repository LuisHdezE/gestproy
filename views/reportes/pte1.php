<?php
    session_start();
    include_once '../controller/dbconfig.php';
    require('/fpdf/fpdf.php');

    if (isset($_GET['annni'])) {
      $ani=$_GET['annni'];
    }
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("logophp.png" , 10 ,8, 35 , 18 , "PNG" ,"http://www.mipagina.com");
    //Arial bold 15
    $this->SetFont('Arial','B',10);
    //Movernos a la derecha
    $this->Cell(80);

    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(255,255,255);
    $this->SetFillColor(255,255,255);
    //Título
    $this->Cell(60,10,'PTE-1. RESULTADOS ESPERADOS Y PRINCIPALES ACTIVIDADES PARA OBTENERLOS',1,0,'C');
    $this->Ln(12);
      $this->Cell(0,0,'             POR DEPENDENCIA Y RECURSOS HUMANOS INVOLUCRADOS',0,0,'C');
    $this->Ln(1);
      $this->Cell(0,16,"Proyecto: ".$_GET['nomb'],0,0,'L');
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
      $this->Cell(40,5,"Resultado",1);
      $this->Cell(30,5,"Fecha",1);
      $this->Cell(60,5,"Actividades",1);
      $this->Cell(60,5,"Indicadores",1);
      $this->Cell(25,5,"Provincia",1);
      $this->Cell(50,5,"Participante",1);
      $this->Ln();
      $this->Cell(40,5,"Planificado",1);
      $this->Cell(15,5,"Ini.",1);
      $this->Cell(15,5,"Ter.",1);
      $this->Cell(60,5,"Principales",1);
      $this->Cell(60,5,"Verificables",1);
      $this->Cell(25,5,"",1);
      $this->Cell(40,5,"Nombre y Apellidos",1);
      $this->Cell(10,5,"%",1);
      
      $this->Ln();

      $conexion = mysql_connect("localhost", "root", "Stop4dogs");
    mysql_select_db("bitnami_redmine", $conexion);
    $queEmp = "SELECT * FROM view_pte1 where project_id='".$_POST['proy']."' and anno='".$_POST['ani']."'";
    $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    $this->SetFont('Arial','I',7);
    while ($row = mysql_fetch_assoc($resEmp)) {
          $this->Cell(40,5,$row['resultado'],1);
          if ($row['inicio']=='1') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='2') { $this->Cell(15,5,"feb",1); }
          if ($row['inicio']=='3') { $this->Cell(15,5,"mar",1); }
          if ($row['inicio']=='4') { $this->Cell(15,5,"abr",1); }
          if ($row['inicio']=='5') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='6') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='7') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='8') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='9') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='10') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='11') { $this->Cell(15,5,"ene",1); }
          if ($row['inicio']=='12') { $this->Cell(15,5,"dic",1); }
          $this->Cell(15,5,$row['termino'],1);
          $this->Cell(60,5,$row['actividades'],1);
          $this->Cell(60,5,$row['indicador'],1);
          $this->Cell(25,5,$row['provincia'],1);
          $this->Cell(40,5,$row['responsable'],1);
          
          $this->Cell(10,5,"",1);
          
          $this->Ln();
    }
      
   }
  
}

$pdf=new PDF('L','mm','A4');
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