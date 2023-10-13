<?php

   require 'int.php';

   Users::CheckPermisosUser('customer', 'page');
   
   Users::LoginCheck();
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('customers');

   Template::GetFoot();