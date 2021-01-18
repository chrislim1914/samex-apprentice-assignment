<?php

    // Load Config
    require_once 'config/config.php';
    
    // load helper 
    require_once 'helpers/url_redirect.php';

    // Autoload Core Classes
    spl_autoload_register(function ($className) {
        require_once 'libraries/'. $className . '.php';
    });
