<?php

   require 'int.php';
   
   Users::LoginCheck();
   
   Template::GetHeader(array('base' => '../'));

   $_GET['guia'] = removeTextGuia($_GET['guia']);

   $Shipments = Envios::GetShipmentsFull($_GET['guia'] );

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('guia');

   Template::GetFoot();