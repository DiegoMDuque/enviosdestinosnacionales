<?php

    class City{

        public static function addCity(){
            $name = $_POST['city_name'];
            if(!empty($name)){
                query("INSERT INTO ciudades( ciudad_name ) VALUES ('$name')");
            }
        }

        public static function editCity(){
            $data = Core::retrumOBJ($_POST);

            query("UPDATE ciudades SET $data->row = '$data->val' WHERE ciudad_id = '$data->city'");
        }


        public static function deleteCity(){

            $id = $_POST['city_id'];

            query("DELETE FROM ciudades WHERE ciudad_id = '$id'");

        }

        public static function GetCityBySelec2(){
            $result['results'] = array();
    
            $text = '';
    
            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }
    
            $users = query("SELECT ciudad_name AS id, ciudad_name as text  FROM ciudades WHERE ciudad_status_envio_destino = 1 and ciudad_name LIKE '$text%' limit 6", 'ALL');
        
            foreach($users as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }

        public static function GetCityEnvioForAPI(){
            $result['results'] = array();

            if(isset($_POST['type'])){

                $type = $_POST['type'];
                
                $cites = query("SELECT ciudad_name AS id, ciudad_name as text  FROM ciudades WHERE $type = 1", 'ALL');


                print(json_encode($cites));
            }else{
                header('HTTP/1.0 400 Bad Request');
                print(json_encode(array('error' => 'type city not found')));
            }
        }

        public static function GetAll(){
            $data  = array();
            $city = query("SELECT *FROM ciudades", 'ALL');

            foreach($city as $val){
                $arr = (object) array(
                    'id'     => $val->ciudad_id,
                    'name'   => $val->ciudad_name,
                    'envio_origen'  => $val->ciudad_status_envio_origen,
                    'envio_destino'  => $val->ciudad_status_envio_destino,
                    'pasaje' => $val->ciudad_status_pasaje,
                );
                array_push($data, $arr);
            }
            return $data;
        }

        public static function OriginActive(){

            $cites = query("SELECT ciudad_name as val, ciudad_name as text  FROM ciudades WHERE ciudad_status_envio_origen = 1", 'ALL');
            
            return $cites;
        }
    }