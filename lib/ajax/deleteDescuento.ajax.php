<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Descuento::deleteDescuento();

    Core::json();