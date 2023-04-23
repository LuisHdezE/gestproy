<?php
session_start();
include_once 'controller/connect.php';
include_once 'controller/dbconfig.php';

$anno=$_SESSION['anno'];
$proy=$_SESSION['proy'];

require_once 'Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

$hh=$crud->annoInicio($proy);

//Informacion del excel
$objPHPExcel->
getProperties()
    ->setSubject("pte7");

//Creando encabezados
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('b7', 'Clave')
    ->setCellValue('C6', 'Fecha de cosecha')
    ->setCellValue('c7', 'Anterior')
    ->setCellValue('d7', 'Actual')
    ->setCellValue('e6', 'Cepa')
    ->setCellValue('f6', 'Variedad')
    ->setCellValue('G6', 'Tipo de suelo')
    ->setCellValue('H6', 'Protocolo actualizado')
    ->setCellValue('J6', 'Continuidad del experimento')
    ->setCellValue('M6', 'Estado actual del experimento Observaciones')
    ->setCellValue('H7', 'Si')
    ->setCellValue('I7', 'No')
    ->setCellValue('J7', 'Si')
    ->setCellValue('K7', 'Baja')
    ->setCellValue('L7', 'Concluye')

    ->setCellValue('B4', 'Proyecto:')
    ->setCellValue('B5', 'J. Proyecto:')
    ->setCellValue('C4', $crud->nombreProyecto($proy))
    ->setCellValue('C5', $crud->nombreJefe($proy))
    ->setCellValue('C3', 'PPTE-7. EXPERIMENTOS VIGENTES');

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('img/logo_inica.png');
$objDrawing->setCoordinates('B1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

//Ajustar ancho de columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(50);

//Ajustar fuentes
$objPHPExcel->getActiveSheet()->getStyle('B7:P8')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B3:B5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B12')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B18')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B19')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B22')->getFont()->setBold(true);

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
$objPHPExcel->getActiveSheet()->getStyle('E7:F8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('C7:N7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('F8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('I7:J7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('M7:N7')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('H8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('J8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('L8')->applyFromArray($styleThinBlackBorderOutline);
$objPHPExcel->getActiveSheet()->getStyle('N8')->applyFromArray($styleThinBlackBorderOutline);

// Set alignments
$objPHPExcel->getActiveSheet()->getStyle('B7:N8')->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setVisible(false);

$proye=$crud->nombreProyecto($proy);
$sql = "SELECT * FROM 'view-pte7'";// where anno=".$anno. " AND name".$proye;
$r=mysql_query($sql);
$d=mysql_num_rows($r);
$i=8;
$registros = mysql_num_rows ($r);
if ($registros > 0) {
    while ( $registro=mysql_fetch_row($r)) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('b'.$i, $registro[4])
            ->setCellValue('C10', $registro[3]);
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

    }
}

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="pte7"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
mysql_close ();
exit;


?>