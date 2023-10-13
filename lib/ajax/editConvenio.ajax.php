<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Convenios::Edit();

    Core::json();