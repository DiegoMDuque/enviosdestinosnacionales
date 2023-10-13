<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Descuento::editStatusDescuento();

    Core::json();