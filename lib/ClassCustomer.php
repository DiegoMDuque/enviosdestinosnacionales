<?php

    class Customer{

        public static function Add(){
            $customer = Core::retrumOBJ($_POST);

            query("INSERT INTO customer(
                customer_name,
                customer_dni,
                customer_email,
                customer_phone,
                customer_address
                ) VALUES (
                    '$customer->name',
                    '$customer->dni',
                    '$customer->email',
                    '$customer->phone',
                    '$customer->address'

                )
            ",);
            
            Core::json();
        }

        public static function validateCustomer(){

        }

        private static function getLastShip($dni){
            $ship = query("SELECT date_sender AS date FROM shipments WHERE dni_sender = '351-24-2566' ORDER BY date_sender DESC LIMIT 1;");

            if($ship){
                return showDate($ship->date);
            }else{
                return '-';
            }
        }

        public static function GetCustomerAll(){
            $data = array();
            $Customers = query("SELECT * FROM customer ORDER BY RAND();", 'ALL');
            foreach($Customers as $customer){

                $avatar = 'assets/img/avatar.png';

                if(!empty($customer->customer_avatar)){
                    $avatar = '';
                }
                $arr = (object) array(
                    'id'         => $customer->customer_id,
                    'dni'        => $customer->customer_dni,
                    'name'       => $customer->customer_name,
                    'email'      => $customer->customer_email,
                    'phone'      => $customer->customer_phone,
                    'last_envio' => self::getLastShip($customer->customer_id)
                );
                array_push($data, $arr);
            }
            return $data;
        }
        public static function deleteCustomer(){
            $id = $_POST['id_customer'];
            query("DELETE FROM customer WHERE customer_id = '$id'");

        }

        public static function GetDataCustomerById(){
            $id = $_GET['customer'];
            
            $customer  = query("SELECT * FROM customer WHERE customer_id = '$id'");
            
            $data = (object) array(
                'id'         => $customer->customer_id,
                'dni'        => $customer->customer_dni,
                'name'       => $customer->customer_name,
                'email'      => $customer->customer_email,
                'phone'      => $customer->customer_phone,
                'address'    => $customer->customer_address,
                'last_envio' => '-'
            );
            return $data;
        }
        public static function Edit(){

            $customer = Core::retrumOBJ($_POST);

            query("UPDATE customer SET 
                
                customer_name    = '$customer->name',
                customer_dni     = '$customer->dni',
                customer_email   = '$customer->email',
                customer_phone   = '$customer->phone',
                customer_address = '$customer->address' WHERE customer_id = '$customer->id'");
        }

        public static function getCustomerBySelect2(){
            $result['results'] = array();
    
            $text = '';
    
            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }
    
            $users = query("SELECT customer_id  AS id, CONCAT(customer_fname, ' ', customer_lname) as text  FROM customer WHERE customer_fname LIKE '$text%' limit 5", 'ALL');
        
            foreach($users as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }
    }