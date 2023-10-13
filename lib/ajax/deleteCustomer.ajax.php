<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Customer::deleteCustomer();

    Core::json();