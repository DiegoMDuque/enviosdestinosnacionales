<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Core::deleteTypePack();

    Core::json();