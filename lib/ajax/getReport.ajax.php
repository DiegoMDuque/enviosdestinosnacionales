<?php

    require '../../int.php';


    function Zero($valor){
        if(empty($valor)){
            return 0;
        }else{
            return $valor;
        }
    }
    
    header('Content-Type: application/json; charset=utf-8');

    if(isset($_POST['dataday']) and isset($_POST['datatype']) and isset($_POST['datos'])){

        $sede = $_POST['sede'];
        $asesor = $_POST['asesor'];

        function countDispatched($date){
            $data = Core::retrumOBJ($_POST);
            $total = 0;
            $dispatched = query("SELECT id FROM dispatched WHERE status = 1 AND date = '$date' and sede LIKE '$data->sede' AND asesor LIKE '$data->asesor'", 'ALL');
          //  echo $data->sede;
            foreach($dispatched as $dispatch){
               $shipments = query("SELECT TRUNCATE(SUM(invoices.total),2) AS total FROM dispatched_shipments INNER JOIN  invoices ON dispatched_shipments.dispatched_id = '$dispatch->id' and invoices.id_envio = dispatched_shipments.shipments_id");

               $total = $total + $shipments->total;
            }
            return $total;
        }

        if($_POST['datos'] == 'guias'){
            $data = array('labels' =>  array(), 'datasets' => array(
                array('label' => 'Guías generadas', 'data' => array(),  'borderColor' => 'rgb(75, 192, 192)'),
                array('label' => 'Guías cancelados', 'data' => array(),  'borderColor' => 'rgb(255, 51, 51)'),
                array('label' => 'Despacho', 'data' => array(), 'borderColor' => 'rgb(51, 255, 60)'),
            ));
            foreach(queryDay($_POST['dataday']) as $date){
                array_push($data['labels'], $date);
                
                $total = query("SELECT COUNT(*)  AS total FROM shipments WHERE date_sender = '$date' and sede LIKE '$sede' AND asesor LIKE '$asesor'");
                array_push($data['datasets'][0]['data'], $total->total);
                $despacho = query("SELECT COUNT(*) as total FROM dispatched WHERE date = '$date' and sede LIKE '$sede' AND asesor LIKE '$asesor'  ");
                array_push($data['datasets'][2]['data'], $despacho->total);
                $cancelado = query("SELECT COUNT(*) as total FROM shipments_audit WHERE date_audit LIKE '$date%' AND new_value = 3 and sede LIKE '$sede' AND asesor LIKE '$asesor' ");
                array_push($data['datasets'][1]['data'], $cancelado->total);
            }
        }elseif($_POST['datos'] == 'recaudo'){

            $data = array('labels' =>  array(), 'datasets' => array(
                array('label' => 'Guías generadas', 'data' => array(),       'borderColor' => 'rgb(75, 192, 192)'),
                array('label' => 'Guías cancelados', 'data' => array(),  'borderColor' => 'rgb(255, 51, 51)'),
                array('label' => 'Despacho', 'data' => array(), 'borderColor' => 'rgb(51, 255, 60)'),
            ));

            foreach(queryDay($_POST['dataday']) as $date){
                array_push($data['labels'], $date);
                $total = query("SELECT TRUNCATE(SUM(invoices.total),2) AS total FROM shipments INNER JOIN invoices ON invoices.id_envio = shipments.id and   shipments.date_sender = '$date' and shipments.sede LIKE '$sede' AND shipments.asesor LIKE '$asesor';");
                array_push($data['datasets'][0]['data'], zero($total->total));
                $despacho = countDispatched($date);
                array_push($data['datasets'][2]['data'], $despacho);
                $cancelado = query("SELECT TRUNCATE(SUM(invoices.total),2) as total FROM shipments INNER JOIN shipments_audit ON shipments.status = 3 AND shipments_audit.date_audit LIKE '$date%' AND shipments.id = shipments_audit.id_shipments INNER JOIN invoices ON invoices.id_envio = shipments.id;");
                array_push($data['datasets'][1]['data'], zero($cancelado->total));
            }
        }
        
        print(json_encode($data));

    }else{
        print(json_encode(array('error' => 'error request')));
    }