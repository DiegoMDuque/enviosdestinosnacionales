<?php

    class Sedes{

        public static function getSedesAll($unset = ''){
            $sedes = Core::retrumOBJ(query("SELECT * FROM sedes WHERE sede_status = 1",'ALL'));
            if(!$unset == ''){
                foreach($sedes as  $key => $sede){
                    if($sede->sede_name == $unset){
                        $sedes->offsetUnset($key);
                    }
                }
            }

            return $sedes;
        }
        public static function getSedesAllTabled(){
            $sedes = Core::retrumOBJ(query("SELECT * FROM sedes",'ALL'));

            return $sedes;
        }

        public static function UpdateSede(){
            if(isset($_POST['status'])){
                $_POST['status'] = 1;
            }else{
                $_POST['status'] = 0;
            }
            $sede = Core::retrumOBJ($_POST);

            query("UPDATE sedes SET
                sede_name         = '$sede->name',
                sede_address      = '$sede->address',
                sede_city         = '$sede->city',
                sede_departamento = '$sede->departamento',
                sede_phone        = '$sede->phone',
                sede_status       = '$sede->status' WHERE sede_code = '$sede->code'");
        }
        public static function add(){
            $sede = Core::retrumOBJ($_POST);

            query("INSERT INTO sedes(
                sede_code,
                sede_name,
                sede_address,
                sede_city,
                sede_departamento,
                sede_phone
                ) VALUES (
                    '$sede->code_new',
                    '$sede->name',
                    '$sede->address',
                    '$sede->city',
                    '$sede->departamento',
                    '$sede->phone'
                )
            ");
        }
        public static function Delete(){
            $sede = Core::retrumOBJ($_POST);

            query("DELETE FROM sedes WHERE sede_code = '$sede->id_sede'");
        }
        public static function getSedesBySelect2(){
            $result['results'] = array();
    
            $text = '';
    
            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }
    
            $users = query("SELECT sede_code AS id, sede_name as text  FROM sedes WHERE sede_name LIKE '$text%' limit 5", 'ALL');
        
            foreach($users as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }
        public static function getBySelect(){
    
            $sedes = query("SELECT sede_code AS value, sede_name as text  FROM sedes WHERE sede_status = 1 ", 'ALL');

            return $sedes;
        }

        public static function getSedeById($id){
            $sede = query("SELECT sede_name as name FROM sedes WHERE sede_id = '$id'");

            return $sede;
        }

        public static function getByName($name){
            $sede = query("SELECT sede_name AS name, sede_code AS code FROM sedes WHERE sede_name = '$name'");
            
            return $sede;
        }
        
        public static function codeFreeSede(){
            $arr = array('A','B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
            $sedes = query('SELECT sede_code as code  FROM sedes WHERE 1', 'ALL');

            foreach($sedes as $sede){
              $arr = array_diff($arr, array($sede->code));
            }

            return $arr;
        }
        public static function getBySelectOption(){
    
            $sedes = query("SELECT sede_code AS val, sede_name as text  FROM sedes WHERE sede_status = 1 ", 'ALL');

            array_unshift($sedes, (OBJECT) array('default' => true, 'val' => '%','text' => 'Todas'));
            return $sedes;
        }
    }