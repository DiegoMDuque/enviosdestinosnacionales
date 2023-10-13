<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Core::addTypePack();
    
    Core::json();