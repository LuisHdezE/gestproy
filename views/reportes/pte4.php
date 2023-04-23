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
    $this->Cell(60,10,'PTE-4. Modelo  Presupuesto Global  del Proyecto',1,0,'C');
    $this->Ln(12);
      $this->Cell(0,0,'             POR DEPENDENCIA Y RECURSOS HUMANOS INVOLUCRADOS',0,0,'C');
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