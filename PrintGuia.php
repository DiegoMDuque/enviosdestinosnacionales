<?php

    require 'int.php';

    Users::LoginCheck(false);
    
    $_GET['guia'] = removeTextGuia($_GET['guia']);

    Envios::PrintGuiaEnvio();
