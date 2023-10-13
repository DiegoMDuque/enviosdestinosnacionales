<?php

    class Descuento{

        public static function addDescuento(){
            
            $data = Core::retrumOBJ($_POST);

            if(!empty($data->descuento_name) and !empty($data->descuento_descuento) ){
                query("INSERT INTO descuentos(
                    des_name,
                    des_quant
                    ) VALUES (
                        '$data->descuento_name',
                        '$data->descuento_descuento'
                    )
                ");
            }
        }

        public static function editStatusDescuento(){
            $data = Core::retrumOBJ($_POST);

            query("UPDATE descuentos SET des_status = '$data->val' WHERE des_id = '$data->id_descuento'");
        }


        public static function deleteDescuento(){

            $id = $_POST['descuento_id'];

            query("DELETE FROM descuentos WHERE des_id = '$id'");

        }

        public static function GetSelect($metodo = ''){
            $descuento = array();
            $result = query("SELECT *  FROM descuentos WHERE des_status = 1", 'ALL');

            array_push($descuento, (object) array('default' => true, 'val' => 0, 'text' => 'Sin descuento'));
            foreach($result as  $val){
                array_push($descuento, (object) array(
                    'cost'      => $val->des_quant,
                    'val'       => $val->des_quant,
                    'text'      => $val->des_name
                ));
            }
            return $descuento;
        }
        public static function GetDescuentoAll(){
    
            $typePack = query("SELECT des_id AS id, des_name as name, des_quant AS quant, des_status AS status  FROM descuentos", 'ALL');
            
            return $typePack;
        }

    }