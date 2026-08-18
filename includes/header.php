<?php
/** @var array $siteData */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1E3A5F">
    <title><?php echo e(company()['name'] ?? SITE_NAME); ?></title>
    <meta name="description" content="HeliWind Renewable Energy solutions for solar, wind-hybrid systems, EV charging, and clean power projects.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(CSS_URL . 'app.css'); ?>">
</head>
<body>
