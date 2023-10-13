<?php

    Class Service{


        public static function GetBySelec2(){
            $result['results'] = array();
            if(isset($_POST['type'])){
                $type = $_POST['type'];

                $text = '';
                if(isset($_POST['text'])){
                    $text = $_POST['text'];
                }
                $users = query("SELECT service_id AS id, service_name as text, service_cost as cost  FROM $type WHERE service_status = 1 and service_name LIKE '$text%' limit 6", 'ALL');
                foreach($users as $val){
                    array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text, 'cost' => $val->cost));
                }
            }
            Core::json($result);
        }

        public static function getAll($get){

            $services = query("SELECT * FROM services WHERE type = '$get' ", 'ALL');

            return $services;
        }
        public static function DeleteService(){

            $data = Core::retrumOBJ($_POST);

            query("DELETE FROM services WHERE id = $data->id");
        }

        public static function Add(){
            $_POST['service_costo'] = noCurrency($_POST['service_costo']);
            $data = Core::retrumOBJ($_POST);
            
            query("INSERT INTO services (
                type,
                name,
                cost
                ) VALUES (
                    '$data->service_type',
                    '$data->service_name',
                    '$data->service_costo'
                )
            ");
        }
        public static function editStatus(){
            $data = Core::retrumOBJ($_POST);

            query("UPDATE services SET status = '$data->val' WHERE id = '$data->id'");
        }
        public static function GetBySelec($services){
            $data = query("SELECT id, name AS text, id AS value, cost as cost  FROM services WHERE status = 1 AND type = '$services' ", 'ALL');
            
            return $data;
        }

        public static function getServicesById($id){
            $service = query("SELECT * FROM `services` WHERE id = '$id'");

            return $service;
        }

        public static function AddServicesBySender($id){
            $services = self::getServicesById($id);
            $id_envio = $_POST['id'];
            $cost = noCurrency($services->cost);
            
            query("INSERT INTO services_shipments(
                id_envio,
                services_type,
                services,
                costo
                ) VALUES (
                    '$id_envio',
                    '$services->type',
                    '$services->name',
                    '$cost'
                )
            ");
        }

        public static function CountFacturaByShip($ship){
            $result = query("SELECT COUNT(*) total FROM services_shipments WHERE id_envio  = '$ship'");

            return $result->total;
        }


    }