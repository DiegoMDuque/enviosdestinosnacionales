<?php


    require 'int.php';
    
    Users::LoginCheck(false);
    
    $_GET['guia'] = removeTextGuia($_GET['guia']);
    
    $plantillaFactura = file_get_contents('template/factura.html');
    
    Invoice::PrintInvoice($_GET['guia']);