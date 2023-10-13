<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Descuento::addDescuento();
    
    Core::json();