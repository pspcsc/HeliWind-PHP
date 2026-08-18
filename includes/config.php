<?php

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('SITE_NAME', 'HeliWind PHP');
define('SITE_URL', 'http://localhost/HeliWind-PHP/');
define('TIMEZONE', 'Asia/Kolkata');
define('DB_HOST', 'localhost');
define('DB_NAME', 'heliwind');
define('DB_USER', 'root');
define('DB_PASS', '');
define('UPLOAD_PATH', __DIR__ . '/../uploads/');
define('ASSET_URL', SITE_URL . 'assets/');
define('CSS_URL', ASSET_URL . 'css/');
define('JS_URL', ASSET_URL . 'js/');
define('IMG_URL', ASSET_URL . 'images/');

date_default_timezone_set(TIMEZONE);
error_reporting(E_ALL);
ini_set('display_errors', '1');

$siteData = require __DIR__ . '/site-data.php';
