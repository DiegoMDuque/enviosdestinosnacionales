<?php

    require '../../int.php';

    Users::LoginCheck(false);

    City::editCity();

    Core::json();