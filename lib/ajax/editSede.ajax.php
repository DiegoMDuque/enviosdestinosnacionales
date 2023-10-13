<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Sedes::UpdateSede();

    sleep(2);
    Core::json();