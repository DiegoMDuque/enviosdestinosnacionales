<?php

    require '../../int.php';

    Users::LoginCheck(false);

    City::deleteCity();

    Core::json();