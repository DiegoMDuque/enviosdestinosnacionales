<?php

    class Dispatched{
        private static function GetIdDispatched(){
            $dispached = query("SHOW TABLE STATUS LIKE 'dispatched'");

            return $dispached->Auto_increment;
        }
        public static function Add(){
            $asesor = Users::getUserById(Users::getUser());
            $_POST['id']     = self::GetIdDispatched();
            $_POST['date']   = date('Y-m-d');
            $_POST['asesor'] = $asesor->id;
            $_POST['sede']   = $asesor->sede;

            $data = Core::retrumOBJ($_POST);

            query("INSERT INTO dispatched (
                id,
                date,
                sede,
                asesor
                ) VALUES (
                    '$data->id',
                    '$data->date',
                    '$data->sede',
                    '$data->asesor'
                )"
            );
            foreach($_POST['guia'] as $val){
                self::Addshipments($val, $data->id);
                Envios::ChangeStatus($val, 2);
            }
            print(json_encode(array('success' => array('id' => $data->id))));
        }
        private static function Addshipments($shipments, $dispatched){
            query("INSERT INTO dispatched_shipments(
                shipments_id,
                dispatched_id
                ) VALUES (
                    '$shipments',
                    '$dispatched'
                )"
            );
        }
        private static function getShipmentsDispatched($dispached){
            $data = Core::retrumOBJ(array());

            $shipmentDispached = query("SELECT * FROM dispatched_shipments WHERE dispatched_id = '$dispached' ORDER BY id DESC", 'ALL');

            foreach($shipmentDispached as $shipment){
                $data->append(Envios::GetShipmentsFull($shipment->shipments_id));
            }
            return $data;
        }
        private static function GetDispatched($id){
            
            $dispached = query("SELECT * FROM dispatched WHERE id = '$id' LIMIT 1");
            
            $data = (object) array(
                'id'        => $dispached->id,
                'fecha'     => $dispached->date,
                'shipments' => self::getShipmentsDispatched($id),
                'asesor'    => UserName($dispached->asesor)
            );


            return $data;
        }
        public static function Print(){
            
            $dispached = self::GetDispatched($_GET['dispatched']);
            
            $plantilla = file_get_contents('template/dispatched.html');
            $body = '';


            foreach($dispached->shipments as $val){
                $body .='<tr>
                            <td class="text-center">'.$val->guia.'</td>
                            <td class="text-center">'.$val->receiver->name.'</td>
                            <td class="text-center">'.$val->origen . ' / '. $val->destino .'</td>
                            <td class="text-center">'.$val->packages[0]->quanty.'</td>
                            <td class="text-center">'.$val->packages[0]->valor_declarado.'</td>
                            <td class="text-center">'.$val->packages[0]->description.'</td>
                        </tr>';
            }
            
            
            $plantilla = str_replace('[LOGO]', URL . '/assets/img/logo-3.jpg', $plantilla);
            $plantilla = str_replace('[TITLE]', 'Desopacho - ' . $dispached->id, $plantilla);
            $plantilla = str_replace('[FECHA]', $dispached->fecha, $plantilla);
            $plantilla = str_replace('[ASESOR]', $dispached->asesor, $plantilla);
            $plantilla = str_replace('[BODY]', $body, $plantilla);

      
            
           Core::PrintPDF($plantilla, 'despacho' . $_GET['dispatched']);
        }
        private static function CountPack($id){
            $cuant = query("SELECT COUNT(*) AS total FROM dispatched_shipments WHERE dispatched_id = '$id'");

            return $cuant->total;
        }
        public static function GetAll(){
            $data = array();
            $dispached = query('SELECT * FROM dispatched', 'ALL');

            foreach($dispached as $val){
                $arr = (object) array(
                    'id'     => $val->id,
                    'fecha'  => date('d-M-Y', strtotime($val->date)),
                    'asesor' => UserName($val->asesor),
                    'sede'   => SedeName($val->sede),
                    'quanty' => self::CountPack($val->id),
                    'status' => $val->status
                );
                array_push($data , $arr);
            }
            return $data;
        }
        private static function ChangeStatus(){
            $data = Core::retrumOBJ($_POST);

            query("UPDATE dispatched SET status = '$data->status' WHERE id = '$data->id'");
        }
        public static function Cancel(){
            self::ChangeStatus();
            $data = Core::retrumOBJ($_POST);
            $shipment = query("SELECT shipments_id FROM dispatched_shipments WHERE dispatched_id = '$data->id'", 'ALL');

            foreach($shipment as $val){
                $_POST['guia'] = $val->shipments_id;
                $_POST['status'] = 1;
                Envios::UpdateSatatusSShipments();
            }
        }
    }