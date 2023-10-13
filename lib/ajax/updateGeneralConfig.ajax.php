<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Core::UpdateGeneralConfig();

    Core::json();