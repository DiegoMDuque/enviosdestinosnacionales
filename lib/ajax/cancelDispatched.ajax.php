<?php

    require '../../int.php';

    Users::LoginCheck(false);

    Dispatched::Cancel();
    
    Core::json();