<?php

    require '../../int.php';
    
    Users::LoginCheck(false);

    $_POST['id'] = Envios::getNumverEnvio();

    $error['error'] = array();
    //sender

    if(empty($_POST['dni_sender'])){
        array_push($error['error'], array('key' => 'dni_sender', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['name_sender'])){
        array_push($error['error'], array('key' => 'name_sender', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['phone_sender'])){
        array_push($error['error'], array('key' => 'phone_sender', 'msg' => 'campo no puede quedar vacio'));
    }

    //receiver
    if(empty($_POST['dni_receiver'])){
        array_push($error['error'], array('key' => 'dni_receiver', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['name_receiver'])){
        array_push($error['error'], array('key' => 'name_receiver', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['phone_receiver'])){
        array_push($error['error'], array('key' => 'phone_receiver', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['destino'])){
        array_push($error['error'], array('key' => 'destino', 'msg' => 'campo no puede quedar vacio'));
    }

    //pack
    if(empty($_POST['quanty'])){
        array_push($error['error'], array('key' => 'quanty', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['embalaje'])){
        array_push($error['error'], array('key' => 'embalaje', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['courier'])){
        array_push($error['error'], array('key' => 'courier', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['description'])){
        array_push($error['error'], array('key' => 'description', 'msg' => 'campo no puede quedar vacio'));
    }
    if(empty($_POST['valor_declarado'])){
        array_push($error['error'], array('key' => 'valor_declarado', 'msg' => 'campo no puede quedar vacio'));
    }
    
    if(empty($error['error'])){ 
        
        Envios::AddNewEnvios();
        Envios::AddPackages();
        Invoice::AddInvoice();
        
        
        if(isset($_POST['pick_up_service'])){
            foreach($_POST['select_pick_up_service'] as $pickup){
                $ArrPickup = (object) array();

                Service::AddServicesBySender($pickup);
            }
        }

        if(isset($_POST['shop_service'])){
            foreach($_POST['select_shopping_service'] as $shop){
                $ArrPickup = (object) array();

                Service::AddServicesBySender($shop);
            }
        }
        Core::json(array('success' => true, 'id' => $_POST['id']));

    }else{
        Core::json($error);
    }
    