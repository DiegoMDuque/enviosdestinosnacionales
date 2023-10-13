<?php

    require '../../int.php';

    Users::LoginCheck(false);

    $validate = Customer::validateCustomer();
    
    if(empty($validate['error'])){
        $form = Core::ValidateForm(array(
            Core::DataraFrom('name'),
            Core::DataraFrom('dni'),
            Core::DataraFrom('phone'),
        ));
        if(empty($form['error'])){
            Customer::Add();
        }else{
            Core::json($form);
        }
    }else{
        Core::json($validate);
    }