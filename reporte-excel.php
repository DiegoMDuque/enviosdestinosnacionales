<?php

    $dataGet = (OBJECT) array('desde' => $_GET['desde'], 'hasta' => $_GET['hasta'], 'sede' => $_GET['sede']);
    $fileName = 'ventas.xlsx';

    require 'lib/vendor/autoload.php';
    require 'int.php';
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    $spread = new Spreadsheet();
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $spreadsheet = $reader->load('template/ventasdiarias.xlsx');
 
    $sheet = $spreadsheet->getActiveSheet();
 
    $sheet->setCellValue('G1', date('d/m/y'));

    $data = Envios::saleDay(setDate($dataGet->desde), setDate($dataGet->hasta), $dataGet->sede);
    //var_dump($data);

    $total = count($data['items']) + 3;
    
    foreach($data['items'] as $ventas){
        $num = 65;
        foreach ($ventas as $key => $value) {
            if($key != 'row'){
                $celda = chr($num) . $ventas->row;

                $sheet->setCellValue($celda, $value);

                $num++;
            }
                
        }
    }
    $sheet->setCellValue('L' . $total, $data['total']);
 
    $writer = $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
    ob_end_clean();
    $writer->save('php://output');
    exit();