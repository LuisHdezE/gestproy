<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */

    session_start();
    $anno=$_SESSION['anno'];
    $proy=$_SESSION['proy'];

 $conexion = mysql_connect ("localhost", "root", "Stop4dogs");
 mysql_select_db ("bitnami_redmine", $conexion);    
 $sql = "SELECT * FROM view_pte2 where anno=".$anno. " AND project_id=".$proy;
 $r=mysql_query($sql);
 $d=mysql_num_rows($r);

 //$resultado = mysql_query ($sql, $conexion) or die (mysql_error ());
 //mysql_select_db("bitnami_redmine");
if ($d>0) {
 $registros = mysql_num_rows ($r);

 
if ($registros > 0) {
   require_once 'Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
    
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("ingenieroweb.com.co")
        ->setLastModifiedBy("ingenieroweb.com.co")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("pte2")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("ingenieroweb.com.co  con  phpexcel")
        ->setCategory("ciudades");    

        //Creando encabezados
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('G2', 'Año:')
            ->setCellValue('C7', 'Actividades Principales')
            ->setCellValue('D7', 'Indicadores verificables')
            
            ->setCellValue('E7', 'Fecha')
            ->setCellValue('E8', 'E')
            ->setCellValue('F8', 'F')
            ->setCellValue('G8', 'M')
            ->setCellValue('H8', 'A')
            ->setCellValue('I8', 'M')
            ->setCellValue('J8', 'J')
            ->setCellValue('K8', 'J')
            ->setCellValue('L8', 'A')
            ->setCellValue('M8', 'S')
            ->setCellValue('N8', 'O')
            ->setCellValue('O8', 'N')
            ->setCellValue('P8', 'D')
            ->setCellValue('B4', 'Proyecto:')
            ->setCellValue('B5', 'J. Proyecto:')
            ->setCellValue('C3', 'PTE-2. CRONOGRAMA DE EJECUCION POR PROYECTO')
            ->setCellValue('B7', 'Resultados Planificados');

    $objDrawing = new PHPExcel_Worksheet_Drawing();

    $objDrawing->setName('Logo');
    $objDrawing->setDescription('Logo');
    $objDrawing->setPath('img/logo_inica.png');
    $objDrawing->setCoordinates('B1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

    //Ajustar ancho de columnas
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);

  //Ajustar fuentes
  $objPHPExcel->getActiveSheet()->getStyle('B7:P8')->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('B3:B5')->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
  //dibujar bordes de celdas
$styleThinBlackBorderOutline = array(
  'borders' => array(
    'outline' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
      'color' => array('argb' => 'FF000000'),
    ),
  ),
);
$objPHPExcel->getActiveSheet()->getStyle('B7:B8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('C7:C8')->applyFromArray($styleThinBlackBorderOutline);

$objPHPExcel->getActiveSheet()->getStyle('E7:P7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('F8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('D7:D8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('C7:C8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('H8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('J8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('L8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('N8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('P8')->applyFromArray($styleThinBlackBorderOutline);

// Set alignments

$objPHPExcel->getActiveSheet()->getStyle('B7:P8')->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setVisible(false);

  $i = 9;   
  while ( $registro=mysql_fetch_row($r)) {
        
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('H2', $registro[3])
            ->setCellValue('Q'.$i, $registro[2])
           
            ->setCellValue('C4', $registro[5])
            ->setCellValue('C5', $registro[6])
            ->setCellValue('B'.$i, $registro[0])
            ->setCellValue('C'.$i, $registro[1])
            ->setCellValue('D'.$i, $registro[4])
            ->setCellValue('E'.$i, '=IF(Q'.$i.'=1," x","")')
            ->setCellValue('F'.$i, '=IF(Q'.$i.'=2," x","")')
            ->setCellValue('G'.$i, '=IF(Q'.$i.'=3," x","")')
            ->setCellValue('H'.$i, '=IF(Q'.$i.'=4," x","")')
            ->setCellValue('I'.$i, '=IF(Q'.$i.'=5," x","")')
            ->setCellValue('J'.$i, '=IF(Q'.$i.'=6," x","")')
            ->setCellValue('K'.$i, '=IF(Q'.$i.'=7," x","")')
            ->setCellValue('L'.$i, '=IF(Q'.$i.'=8," x","")')
            ->setCellValue('M'.$i, '=IF(Q'.$i.'=9," x","")')
            ->setCellValue('N'.$i, '=IF(Q'.$i.'=10," x","")')
            ->setCellValue('O'.$i, '=IF(Q'.$i.'=11," x","")')
            ->setCellValue('P'.$i, '=IF(Q'.$i.'=12," x","")');
  
      $i++;
      $j=$i-1;
       $objPHPExcel->getActiveSheet()->getStyle('B'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('C'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('D'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('E'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('F'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('H'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('G'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('I'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('J'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('K'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('L'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('M'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('N'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('O'.$j)->applyFromArray($styleThinBlackBorderOutline);
       $objPHPExcel->getActiveSheet()->getStyle('P'.$j)->applyFromArray($styleThinBlackBorderOutline);
   }
   
}





header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="pte2"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
}
else
{echo '
        <html>
          <head>
            <meta http-equiv="REFRESH" content="0;url=reportes.php">
          </head>
        </html>
        ';
     }
mysql_close ();
?>