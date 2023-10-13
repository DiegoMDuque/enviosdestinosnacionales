<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Users::ChangePassword();
    
    Core::json();