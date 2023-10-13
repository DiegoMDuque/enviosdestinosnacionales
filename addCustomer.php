<?php

   require 'int.php';
   
   Users::LoginCheck();
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('addCustomer');

   Template::GetFoot();