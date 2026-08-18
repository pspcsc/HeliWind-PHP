<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/includes/db.php';

function admin_user(): array
{
    return $_SESSION['admin_user'] ?? [];
}

function admin_logged_in(): bool
{
    return !empty($_SESSION['admin_user']);
}

function require_admin(): void
{
    if (!admin_logged_in()) {
        header('Location: /HeliWind-PHP/admin/login.php');
        exit;
    }
}
