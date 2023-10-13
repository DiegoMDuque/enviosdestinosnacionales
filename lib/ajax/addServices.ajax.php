<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Service::Add();
    
    Core::json();