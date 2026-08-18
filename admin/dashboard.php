<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/auth.php';
require_admin();

$pageTitle = 'Dashboard';
$stats = [
    'Services' => (int)(fetchOne('SELECT COUNT(*) AS c FROM services')['c'] ?? 0),
    'Projects' => (int)(fetchOne('SELECT COUNT(*) AS c FROM projects')['c'] ?? 0),
    'Pages' => (int)(fetchOne('SELECT COUNT(*) AS c FROM pages')['c'] ?? 0),
    'Enquiries' => (int)(fetchOne('SELECT COUNT(*) AS c FROM contact_enquiries')['c'] ?? 0),
];
require __DIR__ . '/includes/header.php';
?>
<div class="row g-4 mb-4">
    <?php foreach ($stats as $label => $count): ?>
        <div class="col-md-6 col-xl-3">
            <div class="card admin-card h-100">
                <div class="card-body">
                    <div class="text-muted small"><?php echo e($label); ?></div>
                    <div class="display-6 fw-bold"><?php echo $count; ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="card admin-card">
    <div class="card-body">
        <h2 class="h5 fw-bold mb-2">Welcome back</h2>
        <p class="mb-0 text-muted">Use the sidebar to manage site pages, services, projects, and enquiries.</p>
    </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
