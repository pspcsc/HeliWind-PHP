<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';

$pageTitle = $pageTitle ?? 'Admin Panel';
$user = admin_user();
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($pageTitle); ?> · HeliWind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background:#f6f8fb; }
        .admin-sidebar { min-height: calc(100vh - 56px); }
        .admin-card { border:0; border-radius:1rem; box-shadow:0 8px 30px rgba(15,23,42,.08); }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="dashboard.php">HeliWind Admin</a>
        <div class="ms-auto text-white small d-flex align-items-center gap-3">
            <span><i class="bi bi-person-circle"></i> <?php echo e($user['full_name'] ?? 'Admin'); ?></span>
            <a class="btn btn-sm btn-outline-light" href="logout.php">Logout</a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 bg-white border-end admin-sidebar p-0">
            <?php require __DIR__ . '/sidebar.php'; ?>
        </aside>
        <main class="col-lg-10 p-4">
