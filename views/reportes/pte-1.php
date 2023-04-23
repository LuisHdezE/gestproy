<?php
 
    session_start();
    $anno=$_SESSION['anno'];
    $proy=$_SESSION['proy'];
    
    include_once 'controller/connect.php';

    include_once 'controller/dbconfig.php';
    
    $sql = "SELECT * FROM view_pte1 where anno=".$anno. " AND project_id=".$proy;
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
            ->setSubject("pte2");

        //Creando encabezados
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('F3', 'Año:')
            ->setCellValue('C7', 'Fecha')
            ->setCellValue('C8', 'Inicio')
            ->setCellValue('D8', 'Término')
            ->setCellValue('E8', 'Actividades Principales')
            ->setCellValue('F8', 'Indicador verificable')
            ->setCellValue('G8', 'Provincia')
            ->setCellValue('H7', 'Participante')
            ->setCellValue('H8', 'Nombre y Apellido')
            ->setCellValue('I8', '%')
            ->setCellValue('B4', 'Proyecto:')
            ->setCellValue('C4', $crud->nombreProyecto($proy))
            ->setCellValue('C5', $crud->nombreJefe($proy))
            ->setCellValue('B5', 'J. Proyecto:')
            ->setCellValue('B3', 'PTE-1. RESULTADOS ESPERADOS Y PRINCIPALES ACTIVIDADES PARA OBTENERLOS POR DEPENDENCIA')
            ->setCellValue('B7', 'Resultado Planificado');

        $objDrawing = new PHPExcel_Worksheet_Drawing();

        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('img/logo_inica.png');
        $objDrawing->setCoordinates('B1');
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

        //Ajustar ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);

        //Ajustar fuentes
        $objPHPExcel->getActiveSheet()->getStyle('B7:I8')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B3:B5')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);

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
        $objPHPExcel->getActiveSheet()->getStyle('C7:D7')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('C8')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('D8')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('E7:E8')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('F7:F8')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('G7:G8')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('H7:H8')->applyFromArray($styleThinBlackBorderOutline);
        $objPHPExcel->getActiveSheet()->getStyle('I7:I8')->applyFromArray($styleThinBlackBorderOutline);

// Set alignments

        $objPHPExcel->getActiveSheet()->getStyle('B7:P8')->getAlignment()->setWrapText(true);

        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setVisible(false);

        $i = 9;
        
        while ( $registro=mysql_fetch_row($r)) {

            if ($tare==$registro[2]) {
              $tare='';
            }
            else {
                $tare=$registro[2];
            }
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('G3', $registro[3])
                ->setCellValue('B'.$i,$tare)
                ->setCellValue('C'.$i, $registro[5])
                ->setCellValue('D'.$i, $registro[6])
                ->setCellValue('E'.$i, $registro[4])
                ->setCellValue('F'.$i, $registro[7])
                ->setCellValue('H'.$i, $registro[8])
                ->setCellValue('G'.$i, $registro[9]);

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
        }

    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="pte1"');
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