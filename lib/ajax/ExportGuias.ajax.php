<?php

    require '../../int.php';

    Users::LoginCheck(false);

    function id(){
        $data = query("SHOW TABLE STATUS LIKE 'export_guias'");

        return $data->Auto_increment;
    }

    if(isset($_POST['text'])){
        $id        = id();
        $data_json = $_POST['text'];

        query("INSERT INTO export_guias(
            id,
            data_json
            ) VALUES (
                '$id',
                '$data_json'
            )
        ");
        Core::json(array('id' => $id));
    }