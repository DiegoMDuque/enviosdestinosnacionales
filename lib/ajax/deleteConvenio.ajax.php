<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Convenios::delete();

    Core::json();