<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/auth.php';
require_admin();
$pageTitle = 'Projects';
$rows = fetchAllRows('SELECT id, project_name, status, featured FROM projects ORDER BY id DESC');
require __DIR__ . '/includes/header.php';
?>
<div class="card admin-card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">Projects</h1>
            <span class="badge text-bg-primary"><?php echo count($rows); ?> records</span>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>#</th><th>Name</th><th>Status</th><th>Featured</th></tr></thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo (int)$row['id']; ?></td>
                        <td><?php echo e((string)$row['project_name']); ?></td>
                        <td><?php echo (int)$row['status'] ? 'Active' : 'Inactive'; ?></td>
                        <td><?php echo (int)$row['featured'] ? 'Yes' : 'No'; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
