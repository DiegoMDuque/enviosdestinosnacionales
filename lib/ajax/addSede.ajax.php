<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Sedes::add();

    sleep(2);
    Core::json();