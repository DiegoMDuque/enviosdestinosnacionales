<?php

   require 'int.php';
   
   Users::LoginCheck(array('base' => '../'));

   Users::CheckPermisosUser('add_dispatched', 'page');
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('list_dispatched');

   Template::GetFoot();