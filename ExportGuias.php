<?php 
    require 'int.php';
    require 'lib/vendor/autoload.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $reader = IOFactory::createReader("Xlsx");

    $asesor = Users::getUserById(USers::getUser());


    $spreadsheet = $reader->load('template/guias.xlsx');
    $sheet = $spreadsheet->getActiveSheet();

    function getGuia($id){
        $guia = query("SELECT id, name_receiver AS destinatario, CONCAT(origen, ' / ', destino) AS city, sede   FROM shipments WHERE id = '$id' ");
        return $guia;
    }

    function getPack($id){
        $pack = query("SELECT * FROM packages WHERE id_envio = '$id'");

        return $pack;
    }

    $fila = 8;

    if(isset($_GET['ex'])){

        $guias = array();

        $id = $_GET['ex'];

        $ex = query("SELECT * FROM `export_guias` WHERE id = '$id'");

        if($ex){

            $element = json_decode($ex->data_json);

            foreach($element as $val){

                $get = getGuia($val);

                if($get){

                    $pack = getPack($get->id);
                    $sede = Sedes::getByName($get->sede);

                    $arr = (object) array(
                        'fila'             => $fila,
                        'guia'             => $sede->code . '-' .$get->id,
                        'destinatario'     => $get->destinatario,
                        'city'             => $get->city,
                        'cant'             => $pack->quanty,
                        'observaciones'    => $pack->description,
                        'valor'           =>  currency($pack->valor_declarado)
                    );

                    array_push($guias, $arr);

                    $fila = $fila + 1;
                }
            }

            $sheet->setCellValue('C3', $asesor->name);
            $sheet->setCellValue('D4', date('d-M-Y'));

            foreach ($guias as $value) {
                
                $sheet->setCellValue('A'. $value->fila, $value->guia);
                $sheet->setCellValue('B'. $value->fila, $value->destinatario);
                $sheet->setCellValue('C'. $value->fila, $value->city);
                $sheet->setCellValue('D'. $value->fila, $value->cant);
                $sheet->setCellValue('E'. $value->fila, $value->valor);
                $sheet->setCellValue('F'. $value->fila, $value->observaciones);

            }

            $class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf::class;
            $writer   =\PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf');

            $fileName="guias".date('Y-m-d').".pdf";
            header("Content-type:application/pdf");
            header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
            ob_end_clean();
            $writer->save('php://output');
            


        }else{
            echo "<script> window.close(); </script>";
        }
    }else{
        echo "<script> window.close(); </script>";
    } 