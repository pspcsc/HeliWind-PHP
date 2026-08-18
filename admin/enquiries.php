<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/auth.php';
require_admin();
$pageTitle = 'Enquiries';
$rows = fetchAllRows('SELECT id, full_name, mobile, email, subject, enquiry_date, status FROM contact_enquiries ORDER BY id DESC');
require __DIR__ . '/includes/header.php';
?>
<div class="card admin-card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">Enquiries</h1>
            <span class="badge text-bg-primary"><?php echo count($rows); ?> records</span>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th></tr></thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo (int)$row['id']; ?></td>
                        <td><?php echo e((string)$row['full_name']); ?></td>
                        <td><?php echo e((string)$row['mobile']); ?></td>
                        <td><?php echo e((string)$row['email']); ?></td>
                        <td><?php echo e((string)$row['subject']); ?></td>
                        <td><?php echo e((string)$row['enquiry_date']); ?></td>
                        <td><?php echo e((string)$row['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
