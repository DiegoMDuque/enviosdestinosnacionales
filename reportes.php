<?php

   require 'int.php';

   Users::CheckPermisosUser('reporte', 'page');
   
   Users::LoginCheck();
   
   Template::GetHeader();

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('reportes');

   Template::GetFoot();