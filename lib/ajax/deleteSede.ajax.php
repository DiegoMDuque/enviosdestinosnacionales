<?php

    require '../../int.php';

    Users::LoginCheck(false);
    
    Sedes::Delete();

    Core::json();