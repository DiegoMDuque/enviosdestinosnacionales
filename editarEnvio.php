<?php

   require 'int.php';
   
   Users::LoginCheck(array('base' => '../../'));

   Users::CheckPermisosUser('customer', 'page');
   
   Template::GetHeader(array('base' => '../../'));

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('envio');

   Template::GetFoot();