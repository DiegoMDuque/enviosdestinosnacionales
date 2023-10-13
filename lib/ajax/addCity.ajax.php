<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    City::AddCity();
    
    Core::json();