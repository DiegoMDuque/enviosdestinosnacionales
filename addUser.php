<?php

   require 'int.php';
   
   Users::LoginCheck();
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('addUser');

   Template::GetFoot();