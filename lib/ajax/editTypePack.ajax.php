<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Core::updateStatusTypePack();

    Core::json();