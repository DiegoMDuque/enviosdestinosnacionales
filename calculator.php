<?php

   require 'int.php';
   
   Users::LoginCheck(array('base' => '../'));

   Users::CheckPermisosUser('customer', 'page');
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('calculator');

   Template::GetFoot();