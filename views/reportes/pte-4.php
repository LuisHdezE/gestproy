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
        ->setSubject("pte4");

    //Creando encabezados
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('C7', $hh)
        ->setCellValue('E7', $hh+1)
        ->setCellValue('G7', $hh+2)
        ->setCellValue('I7', $hh+3)
        ->setCellValue('K7', $hh+4)
        ->setCellValue('M7', 'Total')
        ->setCellValue('C8', 'CUP')
        ->setCellValue('D8', 'CUC')
        ->setCellValue('E8', 'CUP')
        ->setCellValue('F8', 'CUC')
        ->setCellValue('G8', 'CUP')
        ->setCellValue('H8', 'CUC')
        ->setCellValue('I8', 'CUP')
        ->setCellValue('J8', 'CUC')
        ->setCellValue('K8', 'CUP')
        ->setCellValue('L8', 'CUC')
        ->setCellValue('M8', 'CUP')
        ->setCellValue('N8', 'CUC')
        ->setCellValue('B9', 'Salario')
        ->setCellValue('B10', 'Otras retribuciones')
        ->setCellValue('B11', 'Salario complementario (9,09 % del salario total anual)')
        ->setCellValue('B12', 'Subtotal')
        ->setCellValue('B13', 'Seg. Social (hasta 14% del total de los salarios)')
        ->setCellValue('B14', '15% de impuestos por la utilización de la fuerza de trabajo')
        ->setCellValue('B15', 'Recursos materiales')
        ->setCellValue('B16', 'Subcontrataciones')
        ->setCellValue('B17', 'Otros recursos')
        ->setCellValue('B18', 'Subtotal')
        ->setCellValue('B19', 'Total Gastos Corrientes Directos')
        ->setCellValue('B20', 'Gastos de Capital')
        ->setCellValue('B21', 'Gastos Indirectos')
        ->setCellValue('B22', 'Total Gastos')
        ->setCellValue('B4', 'Proyecto:')
        ->setCellValue('B5', 'J. Proyecto:')
        ->setCellValue('C4', $crud->nombreProyecto($proy))
        ->setCellValue('C5', $crud->nombreJefe($proy))
        ->setCellValue('C3', 'PTE-4. PRESUPUESTO GLOBAL DEL PROYECTO')
        ->setCellValue('B7', 'Conceptos');

        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('img/logo_inica.png');
        $objDrawing->setCoordinates('B1');
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

        //Ajustar ancho de columnas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(55);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
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
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);

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

        for ($i = 9; $i <= 23; $i++)  {
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

        }
        //Totales
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('M9', '=C9+E9+G9+I9+K9')
            ->setCellValue('N9', '=D9+F9+H9+J9+L9')
            ->setCellValue('M10', '=C10+E10+G10+I10+K10')
            ->setCellValue('N10', '=D10+F10+H10+J10+L10')
            ->setCellValue('M11', '=C11+E11+G11+I11+K11')
            ->setCellValue('N11', '=D11+F11+H11+J11+L11')
            ->setCellValue('M12', '=C12+E12+G12+I12+K12')
            ->setCellValue('N12', '=D12+F12+H12+J12+L12')
            ->setCellValue('M13', '=C13+E13+G13+I13+K13')
            ->setCellValue('N13', '=D13+F13+H13+J13+L13')
            ->setCellValue('M14', '=C14+E14+G14+I14+K14')
            ->setCellValue('N14', '=D14+F14+H14+J14+L14')
            ->setCellValue('M15', '=C15+E15+G15+I15+K15')
            ->setCellValue('N15', '=D15+F15+H15+J15+L15')
            ->setCellValue('M16', '=C16+E16+G16+I16+K16')
            ->setCellValue('N16', '=D16+F16+H16+J16+L16')
            ->setCellValue('M17', '=C17+E17+G17+I17+K17')
            ->setCellValue('N17', '=D17+F17+H17+J17+L17')
            ->setCellValue('M18', '=C18+E18+G18+I18+K18')
            ->setCellValue('N18', '=D18+F18+H18+J18+L18')
            ->setCellValue('M19', '=C19+E19+G19+I19+K19')
            ->setCellValue('N19', '=D19+F19+H19+J19+L19')
            ->setCellValue('M20', '=C20+E20+G20+I20+K20')
            ->setCellValue('N20', '=D20+F20+H20+J20+L20')
            ->setCellValue('M21', '=C21+E21+G21+I21+K21')
            ->setCellValue('N21', '=D21+F21+H21+J21+L21')
            ->setCellValue('M22', '=C22+E22+G22+I22+K22')
            ->setCellValue('N22', '=D22+F22+H22+J22+L22');

$anno=$hh;
//if ($d>0) {
//año i
    $sql = "SELECT * FROM pte4_001 where anno=".$anno. " AND idproyecto=".$proy;
    $r=mysql_query($sql);
    $d=mysql_num_rows($r);

    $registros = mysql_num_rows ($r);
    if ($registros > 0) {
        while ( $registro=mysql_fetch_row($r)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C9', $registro[2])
                ->setCellValue('C10', $registro[3]);
        }
    }
        $mate= $crud->gastosMatPCUP($anno,$proy)+$crud->gastosConceptoPCUP('08',$anno,$proy)+$crud->gastosConceptoPCUP('09',$anno,$proy);
        $mate1= $crud->gastosMatPCUC($anno,$proy)+$crud->gastosConceptoPCUC('08',$anno,$proy)+$crud->gastosConceptoPCUC('09',$anno,$proy);
        $inv=$crud->gastosMatEquiPCUP($anno,$proy)+$crud->gastosConceptoPCUP('15',$anno,$proy);
        $inv1=$crud->gastosMatEquiPCUC($anno,$proy)+$crud->gastosConceptoPCUC('15',$anno,$proy);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C11', '=(C9+C10)*0.0909')
                ->setCellValue('C12', '=(C9+C10+C11)')
                ->setCellValue('C13', '=(C12)*0.14')
                ->setCellValue('C14', '=(C12)*0.12')
                ->setCellValue('D15', $mate1)
                ->setCellValue('C15', $mate)
                ->setCellValue('C16', $crud->gastosConceptoPCUP('10', $anno, $proy))
                ->setCellValue('D16', $crud->gastosConceptoPCUC('10', $anno, $proy))
                ->setCellValue('C17', $crud->gastosOtrosRecPCUP($anno, $proy))
                ->setCellValue('D17', $crud->gastosOtrosRecPCUC($anno, $proy))
                ->setCellValue('D18', '=d13+d14+d15+d16+d17')
                ->setCellValue('C18', '=c13+c14+c15+c16+c17')
                ->setCellValue('C19', '=C12+C18')
                ->setCellValue('D19', '=D12+D18')
                ->setCellValue('D20', $inv1)
                ->setCellValue('C20', $inv)
                ->setCellValue('C21', $crud->gastosConceptoPCUP('16', $anno, $proy))
                ->setCellValue('D21', $crud->gastosConceptoPCUC('16', $anno, $proy))
                ->setCellValue('C22', '=C19+C20+C21')
                ->setCellValue('D22', '=D19+D20+D21');
    //año II
    $aa=$hh+1;
    $anno=$aa;
    mysql_close ();
    mysql_select_db($DB_name,$con);
    $sql1 = "SELECT * FROM pte4_001 where anno=".$aa. " AND idproyecto=".$proy;
    $r1=mysql_query($sql1);
    $d1=mysql_num_rows($r1);
    $registros1 = mysql_num_rows ($r1);
    if ($registros1 > 0) {
        while ($registro1 = mysql_fetch_row($r1)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('E9', $registro1[2])
                ->setCellValue('E10', $registro1[3]);
        }
    }
        $mate= $crud->gastosMatPCUP($anno,$proy)+$crud->gastosConceptoPCUP('08',$anno,$proy)+$crud->gastosConceptoPCUP('09',$anno,$proy);
        $mate1= $crud->gastosMatPCUC($anno,$proy)+$crud->gastosConceptoPCUC('08',$anno,$proy)+$crud->gastosConceptoPCUC('09',$anno,$proy);
        $inv=$crud->gastosMatEquiPCUP($anno,$proy)+$crud->gastosConceptoPCUP('15',$anno,$proy);
        $inv1=$crud->gastosMatEquiPCUC($anno,$proy)+$crud->gastosConceptoPCUC('15',$anno,$proy);

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('E11', '=(E9+E10)*0.0909')
                ->setCellValue('E12', '=(E9+E10+E11)')
                ->setCellValue('E13', '=(E12)*0.14')
                ->setCellValue('E14', '=(E12)*0.12')
                ->setCellValue('F15', $mate1)
                ->setCellValue('E15', $mate)
                ->setCellValue('E16', $crud->gastosConceptoPCUP('10', $anno, $proy))
                ->setCellValue('F16', $crud->gastosConceptoPCUC('10', $anno, $proy))
                ->setCellValue('E17', $crud->gastosOtrosRecPCUP($anno, $proy))
                ->setCellValue('F17', $crud->gastosOtrosRecPCUC($anno, $proy))
                ->setCellValue('F18', '=F13+F14+F15+F16+F17')
                ->setCellValue('E18', '=E13+E14+E15+E16+E17')
                ->setCellValue('E19', '=E12+E18')
                ->setCellValue('F19', '=F12+F18')
                ->setCellValue('F20', $inv1)
                ->setCellValue('E20', $inv)
                ->setCellValue('E21', $crud->gastosConceptoPCUP('16', $anno, $proy))
                ->setCellValue('F21', $crud->gastosConceptoPCUC('16', $anno, $proy))
                ->setCellValue('E22', '=e19+E20+E21')
                ->setCellValue('F22', '=F19+F20+F21');
    //año III
    $aa=$hh+2;
    $anno=$aa;
    mysql_close ();
    mysql_select_db($DB_name,$con);
    $sql = "SELECT * FROM pte4_001 where anno=".$aa. " AND idproyecto=".$proy;
    $r=mysql_query($sql);
    $d=mysql_num_rows($r);
    $registros = mysql_num_rows ($r);
    if ($registros > 0) {
        while ($registro = mysql_fetch_row($r)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('G9', $registro[2])
                ->setCellValue('G10', $registro[3]);
        }
    }
    $mate= $crud->gastosMatPCUP($anno,$proy)+$crud->gastosConceptoPCUP('08',$anno,$proy)+$crud->gastosConceptoPCUP('09',$anno,$proy);
    $mate1= $crud->gastosMatPCUC($anno,$proy)+$crud->gastosConceptoPCUC('08',$anno,$proy)+$crud->gastosConceptoPCUC('09',$anno,$proy);
    $inv=$crud->gastosMatEquiPCUP($anno,$proy)+$crud->gastosConceptoPCUP('15',$anno,$proy);
    $inv1=$crud->gastosMatEquiPCUC($anno,$proy)+$crud->gastosConceptoPCUC('15',$anno,$proy);

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('G11', '=(G9+E10)*0.0909')
        ->setCellValue('G12', '=(G9+G10+G11)')
        ->setCellValue('G13', '=(G12)*0.14')
        ->setCellValue('G14', '=(G12)*0.12')
        ->setCellValue('H15', $mate1)
        ->setCellValue('G15', $mate)
        ->setCellValue('G16', $crud->gastosConceptoPCUP('10', $anno, $proy))
        ->setCellValue('H16', $crud->gastosConceptoPCUC('10', $anno, $proy))
        ->setCellValue('G17', $crud->gastosOtrosRecPCUP($anno, $proy))
        ->setCellValue('H17', $crud->gastosOtrosRecPCUC($anno, $proy))
        ->setCellValue('H18', '=H13+H14+H15+H16+H17')
        ->setCellValue('G18', '=G13+G14+G15+G16+G17')
        ->setCellValue('G19', '=G12+G18')
        ->setCellValue('H19', '=H12+H18')
        ->setCellValue('H20', $inv1)
        ->setCellValue('G20', $inv)
        ->setCellValue('G21', $crud->gastosConceptoPCUP('16', $anno, $proy))
        ->setCellValue('H21', $crud->gastosConceptoPCUC('16', $anno, $proy))
        ->setCellValue('G22', '=G19+G20+G21')
        ->setCellValue('H22', '=H19+H20+H21');

    //año IV
    $aa=$hh+3;
    $anno=$aa;
    mysql_close ();
    mysql_select_db($DB_name,$con);
    $sql = "SELECT * FROM pte4_001 where anno=".$aa. " AND idproyecto=".$proy;
    $r=mysql_query($sql);
    $d=mysql_num_rows($r);
    $registros = mysql_num_rows ($r);
    if ($registros > 0) {
        while ($registro = mysql_fetch_row($r)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('I9', $registro[2])
                ->setCellValue('I10', $registro[3]);
        }
    }
    $mate= $crud->gastosMatPCUP($anno,$proy)+$crud->gastosConceptoPCUP('08',$anno,$proy)+$crud->gastosConceptoPCUP('09',$anno,$proy);
    $mate1= $crud->gastosMatPCUC($anno,$proy)+$crud->gastosConceptoPCUC('08',$anno,$proy)+$crud->gastosConceptoPCUC('09',$anno,$proy);
    $inv=$crud->gastosMatEquiPCUP($anno,$proy)+$crud->gastosConceptoPCUP('15',$anno,$proy);
    $inv1=$crud->gastosMatEquiPCUC($anno,$proy)+$crud->gastosConceptoPCUC('15',$anno,$proy);

    $objPHPExcel->setActiveSheetIndex(0)

        ->setCellValue('I11', '=(I9+I10)*0.0909')
        ->setCellValue('I12', '=(I9+I10+I11)')
        ->setCellValue('I13', '=(I12)*0.14')
        ->setCellValue('I14', '=(I12)*0.12')
        ->setCellValue('J15', $mate1)
        ->setCellValue('I15', $mate)
        ->setCellValue('I16', $crud->gastosConceptoPCUP('10', $anno, $proy))
        ->setCellValue('J16', $crud->gastosConceptoPCUC('10', $anno, $proy))
        ->setCellValue('I17', $crud->gastosOtrosRecPCUP($anno, $proy))
        ->setCellValue('J17', $crud->gastosOtrosRecPCUC($anno, $proy))
        ->setCellValue('J18', '=J13+J14+J15+J16+J17')
        ->setCellValue('I18', '=I13+I14+I15+I16+I17')
        ->setCellValue('I19', '=I12+I18')
        ->setCellValue('J19', '=J12+J18')
        ->setCellValue('J20', $inv1)
        ->setCellValue('I20', $inv)
        ->setCellValue('I21', $crud->gastosConceptoPCUP('16', $anno, $proy))
        ->setCellValue('J21', $crud->gastosConceptoPCUC('16', $anno, $proy))
        ->setCellValue('I22', '=I19+I20+I21')
        ->setCellValue('J22', '=J19+J20+J21');

    //año V
    $aa=$hh+4;
    $anno=$aa;
    mysql_close ();
    mysql_select_db($DB_name,$con);
    $sql = "SELECT * FROM pte4_001 where anno=".$aa. " AND idproyecto=".$proy;
    $r=mysql_query($sql);
    $d=mysql_num_rows($r);
    $registros = mysql_num_rows ($r);
    if ($registros > 0) {
        while ($registro = mysql_fetch_row($r)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('K9', $registro[2])
                ->setCellValue('K10', $registro[3]);
        }
    }
    $mate= $crud->gastosMatPCUP($anno,$proy)+$crud->gastosConceptoPCUP('08',$anno,$proy)+$crud->gastosConceptoPCUP('09',$anno,$proy);
    $mate1= $crud->gastosMatPCUC($anno,$proy)+$crud->gastosConceptoPCUC('08',$anno,$proy)+$crud->gastosConceptoPCUC('09',$anno,$proy);
    $inv=$crud->gastosMatEquiPCUP($anno,$proy)+$crud->gastosConceptoPCUP('15',$anno,$proy);
    $inv1=$crud->gastosMatEquiPCUC($anno,$proy)+$crud->gastosConceptoPCUC('15',$anno,$proy);

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('K11', '=(K9+K10)*0.0909')
        ->setCellValue('K12', '=(K9+K10+K11)')
        ->setCellValue('K13', '=(K12)*0.14')
        ->setCellValue('K14', '=(K12)*0.12')
        ->setCellValue('L15', $mate1)
        ->setCellValue('K15', $mate)
        ->setCellValue('K16', $crud->gastosConceptoPCUP('10', $anno, $proy))
        ->setCellValue('L16', $crud->gastosConceptoPCUC('10', $anno, $proy))
        ->setCellValue('K17', $crud->gastosOtrosRecPCUP($anno, $proy))
        ->setCellValue('L17', $crud->gastosOtrosRecPCUC($anno, $proy))
        ->setCellValue('L18', '=L13+L14+L15+L16+L17')
        ->setCellValue('K18', '=K13+K14+K15+K16+K17')
        ->setCellValue('K19', '=K12+K18')
        ->setCellValue('L19', '=L12+L18')
        ->setCellValue('L20', $inv1)
        ->setCellValue('K20', $inv)
        ->setCellValue('K21', $crud->gastosConceptoPCUP('16', $anno, $proy))
        ->setCellValue('L21', $crud->gastosConceptoPCUC('16', $anno, $proy))
        ->setCellValue('K22', '=K19+K20+K21')
        ->setCellValue('L22', '=L19+L20+L21');

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="pte4"');
    header('Cache-Control: max-age=0');

    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
    $objWriter->save('php://output');
mysql_close ();
exit;


?>