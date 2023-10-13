<?php

    class Convenios{

        public static function add(){
            $name = $_POST['convenio_name'];
            if(!empty($name)){
                query("INSERT INTO company_curier( curier_name ) VALUES ('$name')");
            }
        }

        public static function Edit(){
            $data = Core::retrumOBJ($_POST);

            query("UPDATE company_curier SET curier_status = '$data->val' WHERE curier_id  = '$data->id_convenio'");
        }


        public static function Delete(){

            $id = $_POST['convenio_id'];

            query("DELETE FROM company_curier WHERE curier_id  = '$id'");

        }

        public static function GetBySelec2(){
            $result['results'] = array();
    
            $text = '';
    
            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }
    
            $users = query("SELECT ciudad_name AS id, ciudad_name as text  FROM ciudades WHERE ciudad_status_envio = 1 and ciudad_name LIKE '$text%' limit 6", 'ALL');
        
            foreach($users as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }

        public static function getAll(){

            $data = array();
            
            $convenios = query('SELECT * FROM company_curier', 'ALL');

            foreach($convenios as $val){
                $arr = (object) array(
                    'id'     => $val->curier_id,
                    'name'   => $val->curier_name,
                    'status' => $val->curier_status
                );
                array_push($data, $arr);
            }

           return $data;
        }

    }