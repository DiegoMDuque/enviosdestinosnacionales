<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Service::editStatus();

    Core::json();