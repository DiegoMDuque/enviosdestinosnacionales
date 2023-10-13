<?php

   require 'int.php';

   Users::CheckPermisosUser('usuarios', 'page');
   
   Users::LoginCheck();
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('usuarios');

   Template::GetFoot();