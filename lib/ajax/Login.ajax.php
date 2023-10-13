<?php

    require '../../int.php';
    header('Content-Type: application/json; charset=utf-8');


    if(isset($_POST['username']) and isset($_POST['password'])){
        $error['error'] = array('fail' => array());
        if(empty($_POST['username'])){
            array_push($error['error']['fail'], array('key' => 'username', 'msg' => 'correo no puede estar vacio'));
        }
        if(empty($_POST['password'])){
            array_push($error['error']['fail'], array('key' => 'password', 'msg' => 'contraseña no puede estar vacio'));
        }

        if(count($error['error']['fail']) == 0){
            Users::Login();
        }else{
            Core::json($error['error']);
        }
    }