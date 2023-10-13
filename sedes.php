<?php

   require 'int.php';

   Users::CheckPermisosUser('sedes', 'page');
   
   Users::LoginCheck();
   
   Template::GetHeader();
   
   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('sedes');

   Template::GetFoot();