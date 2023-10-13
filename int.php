<?php
        define('VERSION', '1.0.27');
        
        date_default_timezone_set('America/Bogota');
        require 'config.php';
        require 'lib/Conexion.php';
        require 'lib/ClassCore.php';
        require 'lib/function.php';
        require 'lib/ClassTheme.php';
        require 'lib/ClassUsers.php';
        require 'lib/ClassCustomer.php';
        require 'lib/ClassSedes.php';
        require 'lib/ClassModal.php';
        require 'lib/ClassEnvios.php';
        require 'lib/ClassInvoice.php';
        require 'lib/ClassCity.php';
        require 'lib/ClassDescuento.php';
        require 'lib/ClassConvenios.php';
        require 'lib/ClassService.php';
        require 'lib/vendor/autoload.php';
        require 'lib/qr/qrlib.php';
        require 'lib/ClassDispatched.php';

        session_start();