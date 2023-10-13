<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Convenios::Add();
    
    Core::json();