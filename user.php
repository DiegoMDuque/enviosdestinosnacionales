<?php

   require 'int.php';

   Users::CheckPermisosUser('usuarios', 'page');
   
   Users::LoginCheck(true,array('base' => '../'));
   
   Template::GetHeader(array('base' => '../'));

   $user = Users::getInfoUserByget();
   
   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('user');

   Template::GetFoot();