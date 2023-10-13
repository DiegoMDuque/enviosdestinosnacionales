<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Service::DeleteService();

    Core::json();