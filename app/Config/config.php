<?php
define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ini_set('max_execution_time', 0);
}

define('DB_TYPE', 'mysql');
define('DB_HOST', '172.50.2.50');
define('DB_NAME', 'hfocus_hmg');
define('DB_USER', 'root');
define('DB_PASS', 'Hfocus0473');
define('DB_CHARSET', 'utf8');