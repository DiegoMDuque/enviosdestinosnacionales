<?php

   //tony estuvo aqui
   require 'int.php';
   
   Users::LoginCheck();
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('settings');

   Template::GetFoot();