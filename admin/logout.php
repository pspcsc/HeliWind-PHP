<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';
$_SESSION = [];
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
header('Location: login.php');
exit;
