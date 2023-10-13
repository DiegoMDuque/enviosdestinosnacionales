<?php

    class Envios{

        public static function GetShipments(){
            if(!isset($_GET['filter'])){
                $sql = "SELECT * FROM shipments ORDER BY id DESC";
            }else{
                
                if(!$_GET['dateStart'] == ''){
                    $dateStart = date('Y-m-d', strtotime($_GET['dateStart']));
                }else{
                    $dateStart = '0000-00-00';
                }
                if(!$_GET['dateEnd'] == ''){
                    $dateEnd   = date('Y-m-d', strtotime($_GET['dateEnd']));
                }else{
                    $dateEnd   = '3000-12-31';
                }

                $asesor = $_GET['asesor'];
                $sede   = $_GET['sede'];

                $sql = "SELECT * FROM shipments WHERE date_sender >= '$dateStart' AND date_sender <= '$dateEnd' AND asesor LIKE '$asesor' AND sede LIKE '$sede' ORDER BY id DESC;"; 
            }

            $datos['data']  = array();

            $envios = query($sql, 'ALL');
            
            foreach($envios as $val){
                $asesor = Users::getUserById($val->asesor);
                $arr = (object) array(
                    'id'       => $val->id,
                    'guia'     => $val->sede . '-' . $val->id,
                    'fecha'    => showDate($val->date_sender),
                    'asesor'   => $asesor->name,
                    'origen'   => $val->origen,
                    'destino'  => $val->destino,
                    'sede'     => SedeName($val->sede),
                    'sender'   => $val->name_sender,
                    'receiver' => $val->name_receiver,
                    'status'   => statusShippingName($val->status)
                );

                array_push($datos['data'], $arr);
            }
            return $datos;
        }

        public static function getNumverEnvio(){
            $shipments = query("SHOW TABLE STATUS LIKE 'shipments'");
            
            return $shipments->Auto_increment;
        }

        public static function AddNewEnvios(){
            $asesor = Users::getUserById(Users::getUser());
            $_POST['asesor'] =    $asesor->id;
            $_POST['sede']        = $asesor->sede;
            $_POST['id']          = self::getNumverEnvio();
            $_POST['fecha']       = date('Y-m-d');

            $packaging = Core::retrumOBJ($_POST);

            query("INSERT INTO shipments (
                id,
                date_sender,
                asesor,
                sede,
                origen,
                destino,
                dni_sender,
                name_sender,
                phone_sender,
                dni_receiver,
                name_receiver,
                phone_receiver
                ) VALUES (
                    '$packaging->id',
                    '$packaging->fecha',
                    '$packaging->asesor',
                    '$packaging->sede',
                    '$packaging->origen',
                    '$packaging->destino',
                    '$packaging->dni_sender',
                    '$packaging->name_sender',
                    '$packaging->phone_sender',
                    '$packaging->dni_receiver',
                    '$packaging->name_receiver',
                    '$packaging->phone_receiver'
                )
            ");
        }

        public static function Addpackages(){
            $_POST['valor_declarado'] = noCurrency($_POST['valor_declarado']);

            $_POST['high']   = sumaPost($_POST['high']);
            $_POST['width']  = sumaPost($_POST['width']);
            $_POST['length'] = sumaPost($_POST['length']);

            $packages = Core::retrumOBJ($_POST);
            query("INSERT INTO packages(
                id_envio,
                embalaje,
                quanty,
                courier,         
                description,
                valor_declarado,
                weight,
                high,
                width,
                length
                ) VALUES (
                    '$packages->id',
                    '$packages->embalaje',
                    '$packages->quanty',
                    '$packages->courier',
                    '$packages->description',
                    '$packages->valor_declarado',
                    '$packages->weight',
                    '$packages->high',
                    '$packages->width',
                    '$packages->length'
                )
            ");

        }

        public static function GetShipmentsFull($guia){
            
            $guia     = query("SELECT * FROM shipments WHERE id = '$guia'");
            
            $asesor = Users::getUserById($guia->asesor);

                 $arr = (object) array(
                    'id'       => $guia->id,
                    'guia'     => $guia->sede . '-' .$guia->id,
                    'fecha'    => date('d/m/Y', strtotime($guia->date_sender) ),
                    'asesor'   => $asesor->name,
                    'origen'   => $guia->origen,
                    'destino'  => $guia->destino,
                    'sede'     => $guia->sede,
                    'qr'       => Core::GenerateQR($guia->sede  . '-' .$guia->id),
                    'barcode'  => Core::GenerateBarcode($guia->sede  . '-' .$guia->id),
                    'status'   => $guia->status,
                    'sender'    => (object) array(
                        'name'  => $guia->name_sender,
                        'dni'   => $guia->dni_sender,
                        'phone' => $guia->phone_sender,
                        'email' => '',
                    ),
                    'receiver'  =>  (object) array(
                        'name'  => $guia->name_receiver,
                        'dni'   => $guia->dni_receiver,
                        'phone' => $guia->phone_receiver,
                        'email' => '',
                    ),

                    'invoice'   =>  Invoice::getInvoiceByShipment($guia->id),
                    'packages'  => self::GetpackagesByShipments($guia->id),
                    'servicios' => (object) array(
                        'total' => self::getTotalSerivices($guia->id),
                        'items' => self::GetServicesByShipments($guia->id)
                    ),
                );
                return $arr;
        }

        private static function getTotalSerivices($id){
            $servicio = self::GetServicesByShipments($id);
            $arr = (object) array('shop' => 0, 'shop_q' => 0, 'pickup' => 0, 'pick_q' => 0);

            foreach($servicio as $val){
                if($val->type == 'pickup'){
                    $arr->pickup = $arr->pickup + $val->costo;
                    $arr->pick_q = $arr->pick_q + 1;
                }elseif($val->type == 'shop'){
                    $arr->shop = $arr->shop + $val->costo;
                    $arr->shop_q = $arr->shop_q + 1;
                }
            }
            
            $arr->pickup = ($arr->pickup > 0) ? currency(substr($arr->pickup, 0, -2)) : currency($arr->pickup);
            $arr->shop   = ($arr->shop > 0)   ? currency(substr($arr->shop, 0, -2))   : currency($arr->shop);
            return $arr;
        }
        public static function GetpackagesByShipments($guia = ''){
                $arrayobj = array();
                $packages = query("SELECT * FROM packages WHERE id_envio = '$guia'", 'ALL');
                foreach($packages as $package){
                    array_push($arrayobj, (object) array(
                        'id'              => $package->id,
                        'quanty'          => $package->quanty,
                        'courier'         => $package->courier,
                        'description'     => $package->description,
                        'valor_declarado' => currency($package->valor_declarado),
                        'weight'          => $package->weight,
                        'high'            => $package->high,
                        'width'           => $package->width,
                        'length'         => $package->length
                    ));
                }
    
            return $arrayobj;
        }

        public static function GetServicesByShipments($id){
            $servicios = array();
            $result = query("SELECT * FROM services_shipments WHERE id_envio = '$id'", 'ALL');
            foreach($result as $servicio){
                array_push($servicios, (object) array(
                    'id'        => $servicio->id,
                    'type'      => $servicio->services_type,
                    'services'  => $servicio->services,
                    'costo'     => $servicio->costo
                ));
            }
            return $servicios;

        }
        public static function PrintGuiaEnvio(){
            $shipments = self::GetShipmentsFull($_GET['guia']);
            
            $plantilla = file_get_contents('template/guia.html');
    
            $plantilla = str_replace('[LOGO]', URL . '/assets/img/logo-3.jpg', $plantilla);
            $plantilla = str_replace('[TITLE]', $shipments->guia, $plantilla);
            $plantilla = str_replace('[GUIA]', $shipments->guia, $plantilla);
            $plantilla = str_replace('[FECHA]', $shipments->fecha, $plantilla);
            $plantilla = str_replace('[QUANTY]', $shipments->packages[0]->quanty, $plantilla);
            $plantilla = str_replace('[PESO]', $shipments->packages[0]->weight, $plantilla);
            $plantilla = str_replace('[ALTO]', $shipments->packages[0]->high, $plantilla);
            $plantilla = str_replace('[ANCHO]', $shipments->packages[0]->width, $plantilla);
            $plantilla = str_replace('[LARGO]', $shipments->packages[0]->length, $plantilla);
            $plantilla = str_replace('[PACK]', $shipments->packages[0]->id, $plantilla);
            $plantilla = str_replace('[ORIGEN]', $shipments->origen, $plantilla);
            $plantilla = str_replace('[DESTINO]', $shipments->destino, $plantilla);
        
            $plantilla = str_replace('[SENDER_NAME]', $shipments->sender->name, $plantilla);
            $plantilla = str_replace('[SENDER_DNI]', $shipments->sender->dni, $plantilla);
            $plantilla = str_replace('[SENDER_PHONE]', $shipments->sender->phone, $plantilla);
            $plantilla = str_replace('[SENDER_EMAIL]', $shipments->sender->email, $plantilla);
        
            $plantilla = str_replace('[RECEIVER_NAME]', $shipments->receiver->name, $plantilla);
            $plantilla = str_replace('[RECEIVER_DNI]', $shipments->receiver->dni, $plantilla);
            $plantilla = str_replace('[RECEIVER_PHONE]', $shipments->receiver->phone, $plantilla);
            $plantilla = str_replace('[RECEIVER_EMAIL]', $shipments->receiver->email, $plantilla);
            $plantilla = str_replace('[QR]', $shipments->qr, $plantilla);
            $plantilla = str_replace('[BARCODE]', $shipments->barcode, $plantilla);

            Core::PrintPDF($plantilla, 'guia');
        }

        public static function getByDispatched(){
            $guia = $_POST['code'];
            $id =  removeTextGuia($_POST['code']);
            $shipments = query("SELECT * FROM shipments WHERE id = '$id' and status = 1 ");

            if($shipments){
                $arr  = (object) array(
                    'success'      => true,
                    'id'           => $shipments->id,
                    'guia'         => $shipments->sede . '-' . $shipments->id,
                    'origen'       => $shipments->origen,
                    'destino'      => $shipments->destino,
                    'remitente'    => $shipments->name_sender,
                    'destinatario' => $shipments->name_receiver
                );
            }else{
                $arr  = (object) array(
                    'success'      => false,
                );
            }

            print(json_encode($arr));
        }

        public static function ChangeStatus($id, $status){
            query("UPDATE shipments SET status = '$status' WHERE id = '$id'");
        }

        public static function UpdateSatatusSShipments(){
            $_POST['id'] = removeTextGuia($_POST['guia']);
            $_POST['asesor_update'] = Users::getUser();
            $data = Core::retrumOBJ($_POST);

            query("UPDATE shipments SET status = '$data->status', asesor_update = '$data->asesor_update' WHERE id = '$data->id'");
        }
        private static function getPackGuia($guia){
            $pack = query("SELECT COUNT(*) as total, description, embalaje FROM packages WHERE  id_envio = '$guia'");
    
            return $pack;
        }
        private static function granTotalDiario($date){
            $result = query("SELECT SUM(total) as total FROM invoices WHERE fecha  '$date'");

            $val = (!is_null($result->total)) ? $result->total : 0;

            return $val;
    
        }
        private static function countShopById($id, $type){
            $rsult = query("SELECT COUNT(*) AS total FROM services_shipments WHERE id_envio = '$id' AND services_type	 = '$type'");

            return $rsult->total;
        }
        private static function ItemsDiarios($desde, $hasta, $sede){
            $sede  = (empty($sede)) ? '%' : $sede;
            $data = array('items' => array(), 'total' => 0);
            $items = query(
                "SELECT
                    shipments.id AS id,
                    CONCAT(shipments.sede, '-', shipments.id) AS guia,
                    date_sender AS date,
                    sedes.sede_name AS sede,
                    name_sender,
                    name_receiver,
                    destino,
                    total
                FROM
                    shipments
                    INNER JOIN invoices ON shipments.id = invoices.id_envio AND shipments.sede LIKE '$sede'
                    INNER JOIN sedes ON shipments.sede = sedes.sede_code
                WHERE
                    shipments.date_sender BETWEEN '$desde' AND '$hasta'",
                'ALL');
            $row = 3;

            foreach($items as $key => $val){
                $arr = (object) array(               
                    'guia'         => $val->guia,
                    'fecha'        => showDate($val->date),
                    'sede'         => $val->sede,
                    'cant'         => self::getPackGuia($val->id)->total,
                    'tipo'         => self::getPackGuia($val->id)->embalaje,
                    'shop'         => self::countShopById($val->id, 'shop'),
                    'pick'         => self::countShopById($val->id, 'pickup'),
                    'remitente'    => $val->name_sender,
                    'destinatario' => $val->name_receiver,
                    'descripcion'  => self::getPackGuia($val->id)->description,
                    'destino'      => $val->destino,
                    'banco'        => currency($val->total),
                    'row'          => $row
                );
                $row = $row + 1;
                array_push($data['items'], $arr);
                $data['total'] = $data['total'] + $val->total;
            }
            $data['total'] = currency($data['total']);
            return $data;
        }
        public static function saleDay($desde, $hasta, $sede){
            
            
            $arr =self::ItemsDiarios($desde, $hasta, $sede);
            sleep(3);
            return $arr;
        }
    }

    