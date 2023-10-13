<?php

    require '../../int.php';
    header('Content-Type: application/json; charset=utf-8');
    
    
    print(
        json_encode(
            Envios::saleDay(setDate($_POST['desde']), setDate($_POST['hasta']), $_POST['sede'])
        )
    );