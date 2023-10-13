<?php

   require 'int.php';
   
   Users::LoginCheck(array('base' => '../'));

   Users::CheckPermisosUser('customer', 'page');

   $customer = Customer::GetDataCustomerById();
   
   Template::GetHeader(array('base' => '../'));

   require Core::RequiereInc('sidebar');

   require Core::RequiereInc('editCustomer');

   Template::GetFoot();