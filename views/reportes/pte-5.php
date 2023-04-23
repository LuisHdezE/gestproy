<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */

    session_start();
    $anno=$_SESSION['anno'];
    $proy=$_SESSION['proy'];

 $conexion = mysql_connect ("localhost", "root", "Stop4dogs");
 mysql_select_db ("bitnami_redmine", $conexion);    
 //$sql = "SELECT * FROM gastos_salario WHERE proyecto=".$proy." AND anno=".$anno;
 $sql = "SELECT * FROM gastos_salario where anno=".$anno. " AND project_id=".$proy;
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
                        
            ->setCellValue('A7', 'No')
            ->setCellValue('B7', 'Nombre y apellidos')
            ->setCellValue('C7', 'Categoría científica, docente o tecnológica')
            ->setCellValue('D7', 'Provincia')
            ->setCellValue('E7', '% Part.')
            ->setCellValue('F7', 'Salario cargo')
            ->setCellValue('G7', 'Salario anual')
            ->setCellValue('H7', 'Res. 15')
            ->setCellValue('I7', 'Pago por res.')
            ->setCellValue('J7', 'SubTotal Sal.')
            ->setCellValue('K7', '9.09')
            ->setCellValue('L7', 'salario total')
            ->setCellValue('M7', '14% seg social')
            ->setCellValue('N7', '15% imp F trabajo')

            ->setCellValue('B4', 'Proyecto:')
            ->setCellValue('B5', 'J. Proyecto:')
            ->setCellValue('C3', 'PTE-5. PRESUPUESTO DEL PROYECTO POR PARTIDAS Y PROVINCIAS');
            

    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setName('Logo');
    $objDrawing->setDescription('Logo');
    $objDrawing->setPath('img/logo_inica.png');
    $objDrawing->setCoordinates('B1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

    //Ajustar ancho de columnas
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(28);
  $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(24);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);

  //Ajustar fuentes
  $objPHPExcel->getActiveSheet()->getStyle('B7:N7')->getFont()->setBold(true);
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

$objPHPExcel->getActiveSheet()->getStyle('E7:N7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('F8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('D7:D8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('C7:C8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('H8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('J8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('L8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('N8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('F7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('H7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('J7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('L7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('A7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('M7')->applyFromArray($styleThinBlackBorderOutline);

// Set alignments

$objPHPExcel->getActiveSheet()->getStyle('B7:P8')->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setVisible(false);

  $i = 8;   
  while ( $registro=mysql_fetch_row($r)) {
        $k=$i-7;
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('H2', $registro[3])
                    
            ->setCellValue('C4', $registro[18])
            ->setCellValue('C5', $registro[19])

            ->setCellValue('A'.$i, $k)
            ->setCellValue('B'.$i, $registro[5])
            ->setCellValue('C'.$i, $registro[7])
            ->setCellValue('D'.$i, $registro[8])
            ->setCellValue('E'.$i, $registro[10])
            ->setCellValue('F'.$i, $registro[11])
            ->setCellValue('G'.$i, $registro[12])
            ->setCellValue('H'.$i, $registro[14])
            ->setCellValue('I'.$i, '=G'.$i.'*0.52')
            ->setCellValue('J'.$i, '=G'.$i.'+H'.$i.'+I'.$i)
            ->setCellValue('K'.$i, '=J'.$i.'*0.0909')
            ->setCellValue('L'.$i, '=J'.$i.'+K'.$i)
            ->setCellValue('M'.$i, '=L'.$i.'*0.14')
            ->setCellValue('N'.$i, '=L'.$i.'*0.1');
  
      $i++;
      $j=$i-1;
      $objPHPExcel->getActiveSheet()->getStyle('A'.$j)->applyFromArray($styleThinBlackBorderOutline);
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
       
   }
   
}





header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="pte5.xlsx"');
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