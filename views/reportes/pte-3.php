<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */
session_start();
    $anno=$_SESSION['anno'];
    $proy=$_SESSION['proy'];

    include_once 'controller/connect.php';

    include_once 'controller/dbconfig.php';

 $sql = "SELECT * FROM view_horas_x_proy where anno=".$anno. " AND project_id=".$proy;
 $r=mysql_query($sql);
 $d=mysql_num_rows($r);

if ($d>0) {
 $registros = mysql_num_rows ($r);
  
if ($registros > 0) {
   require_once 'Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
    
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setSubject("PTE-3");

        //Creando encabezados
    $objPHPExcel->setActiveSheetIndex(0)

            ->setCellValue('B6', 'Nombre y Apellidos')
            ->setCellValue('C6', 'Grado')
            ->setCellValue('C7', 'científico')
            ->setCellValue('D6', 'Categoría científica,')
            ->setCellValue('D7', 'docente o tecnológica')
            ->setCellValue('E6', 'Entidad')
            ->setCellValue('F6', '% de part.')
            ->setCellValue('G6', 'Sin estimulacion,')
            ->setCellValue('G7', 'Salario anual')
            ->setCellValue('H6', 'Salario')
            ->setCellValue('H7', 'Anual')
            ->setCellValue('B3', 'Proyecto:')
            ->setCellValue('B5', 'J. Proyecto:')
            ->setCellValue('C5', $crud->nombreJefe($proy))
            ->setCellValue('D2', 'PTE-3. PARTICIPANTES EN EL PROYECTO')
            ->setCellValue('B4', 'Codigo');

    $objDrawing = new PHPExcel_Worksheet_Drawing();

    $objDrawing->setName('Logo');
    $objDrawing->setDescription('Logo');
    $objDrawing->setPath('img/logo_inica.png');
    $objDrawing->setCoordinates('B1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
  
  //Ajustar ancho de columnas
  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);

  //Ajustar fuentes
  $objPHPExcel->getActiveSheet()->getStyle('B6:H7')->getFont()->setBold(true);
  $objPHPExcel->getActiveSheet()->getStyle('B3:B5')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('c2:e2')->getFont()->setBold(true);

  $i = 8;

    //dibujar bordes de celdas
    $styleThinBlackBorderOutline = array(
        'borders' => array(
            'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('argb' => 'FF000000'),
            ),
        ),
    );
    $objPHPExcel->getActiveSheet()->getStyle('B6:H7')->applyFromArray($styleThinBlackBorderOutline);
    $objPHPExcel->getActiveSheet()->getStyle('C6:C7')->applyFromArray($styleThinBlackBorderOutline);
    $objPHPExcel->getActiveSheet()->getStyle('E6:E7')->applyFromArray($styleThinBlackBorderOutline);
    $objPHPExcel->getActiveSheet()->getStyle('G6:G7')->applyFromArray($styleThinBlackBorderOutline);

  while ( $registro=mysql_fetch_row($r)) {
        
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C3', $registro[2])
            ->setCellValue('B'.$i, $registro[5])
            ->setCellValue('C'.$i, $registro[6])
            ->setCellValue('D'.$i, $registro[7])
            ->setCellValue('E'.$i, $registro[8])
            ->setCellValue('F'.$i, round($registro[10]*100)/100)
            ->setCellValue('G'.$i, round($registro[12]*100)/100);

      $i++;
      $j=$i-1;
      $objPHPExcel->getActiveSheet()->getStyle('B'.$j)->applyFromArray($styleThinBlackBorderOutline);
      $objPHPExcel->getActiveSheet()->getStyle('C'.$j)->applyFromArray($styleThinBlackBorderOutline);
      $objPHPExcel->getActiveSheet()->getStyle('D'.$j)->applyFromArray($styleThinBlackBorderOutline);
      $objPHPExcel->getActiveSheet()->getStyle('E'.$j)->applyFromArray($styleThinBlackBorderOutline);
      $objPHPExcel->getActiveSheet()->getStyle('F'.$j)->applyFromArray($styleThinBlackBorderOutline);
      $objPHPExcel->getActiveSheet()->getStyle('H'.$j)->applyFromArray($styleThinBlackBorderOutline);
      $objPHPExcel->getActiveSheet()->getStyle('G'.$j)->applyFromArray($styleThinBlackBorderOutline);

       
   }

   
}


    header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="pte-3.xlsx"');
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