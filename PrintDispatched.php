<?php

    require 'int.php';

    Users::LoginCheck(false);
    
    $_GET['dispatched'] = removeTextGuia($_GET['dispatched']);

    Dispatched::Print();