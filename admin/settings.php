<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/auth.php';
require_admin();
$pageTitle = 'Settings';
$settings = fetchOne('SELECT * FROM site_settings ORDER BY id ASC LIMIT 1') ?: [];
require __DIR__ . '/includes/header.php';
?>
<div class="card admin-card">
    <div class="card-body">
        <h1 class="h4 mb-3">Site Settings</h1>
        <div class="row g-3 small">
            <div class="col-md-6"><strong>Site Name:</strong> <?php echo e((string)($settings['site_name'] ?? '')); ?></div>
            <div class="col-md-6"><strong>Email:</strong> <?php echo e((string)($settings['email'] ?? '')); ?></div>
            <div class="col-md-6"><strong>Phone:</strong> <?php echo e((string)($settings['phone'] ?? '')); ?></div>
            <div class="col-md-6"><strong>Website:</strong> <?php echo e((string)($settings['website'] ?? '')); ?></div>
            <div class="col-12"><strong>Address:</strong> <?php echo e((string)($settings['address'] ?? '')); ?></div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
