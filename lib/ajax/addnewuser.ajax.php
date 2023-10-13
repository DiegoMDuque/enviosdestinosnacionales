<?php


    require '../../int.php';

    Users::LoginCheck(false);

    $validate = Users::validateUserExiten();
    
    if(empty($validate['error'])){
        $form = Core::ValidateForm(array(
            Core::DataraFrom('username', 'Coloque nombre de usuario'),
            Core::DataraFrom('fname'),
            Core::DataraFrom('lname'),
            Core::DataraFrom('dni'),
            Core::DataraFrom('sede'),
            Core::DataraFrom('password')
        ));
        if(empty($form['error'])){
            Users::AddNewUser();
        }else{
            Core::json($form);
        }
    }else{
        Core::json($validate);
    }