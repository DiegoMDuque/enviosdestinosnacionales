<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Users::UpdateUser();

    sleep(1);

    Core::json();