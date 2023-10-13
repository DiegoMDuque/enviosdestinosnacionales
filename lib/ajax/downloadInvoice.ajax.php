<?php

    require '../../int.php';

    require '../vendor/autoload.php';

    Users::LoginCheck(false);

    function envio(){
        $envio = query("SELECT * FROM envios WHERE envio_id = '1'");
    }
    


    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spread = new Spreadsheet();
    
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    $spreadsheet = $reader->load('../../template/factura.xlsx');
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('G17', "15");
    
    

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="salida.xlsx"');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    $writer->save('php://output');

    Core::json();
