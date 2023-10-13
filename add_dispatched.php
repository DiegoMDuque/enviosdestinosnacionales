<?php

   require 'int.php';
   
   Users::LoginCheck();

   Users::CheckPermisosUser('add_dispatched', 'page');
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('add_dispatched');

   Template::GetFoot();