<?php

    require '../../../int.php';

    if(!empty($_POST['dni'])){
        
        $dni = $_POST['dni'];
        
        $customer = query("SELECT customer_name as name, customer_phone as phone FROM customer WHERE customer_dni = '$dni' LIMIT 1");
        
        if($customer){
            Core::json(array('customer' => array('name' => $customer->name, 'phone' => $customer->phone)));
        }else{
            Core::json(); 
        }

    }else{
        Core::json();
    }