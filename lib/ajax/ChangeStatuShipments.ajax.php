<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Envios::UpdateSatatusSShipments();

    Core::json();