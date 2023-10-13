<?php

   require 'int.php';
   
   Users::LoginCheck(array('base' => '../'));

   Users::CheckPermisosUser('envios', 'page');
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('envios');

   Template::GetFoot();