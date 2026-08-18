<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/crud.php';

require_admin();

if (admin_get('action') && admin_get('id')) {
    $id = (int) admin_get('id');
    $action = (string) admin_get('action');

    if ($action === 'read') {
        executeQuery('UPDATE contact_enquiries SET is_read = 1, status = "In Progress" WHERE id = :id', ['id' => $id]);
        admin_flash('success', 'Enquiry marked as read.');
        admin_redirect('enquiries.php');
    }

    if ($action === 'close') {
        executeQuery('UPDATE contact_enquiries SET status = "Closed" WHERE id = :id', ['id' => $id]);
        admin_flash('success', 'Enquiry closed.');
        admin_redirect('enquiries.php');
    }

    if ($action === 'delete') {
        executeQuery('DELETE FROM contact_enquiries WHERE id = :id', ['id' => $id]);
        admin_flash('success', 'Enquiry deleted.');
        admin_redirect('enquiries.php');
    }
}

$pageTitle = 'Enquiries';
$rows = fetchAllRows('SELECT id, full_name, mobile, email, subject, enquiry_date, status, is_read FROM contact_enquiries ORDER BY id DESC');
$selected = admin_get('view') ? fetchOne('SELECT * FROM contact_enquiries WHERE id = :id LIMIT 1', ['id' => (int) admin_get('view')]) : null;
require __DIR__ . '/includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h4 mb-1">Enquiries</h1>
        <div class="text-muted">View and manage contact submissions.</div>
    </div>
    <span class="badge text-bg-primary"><?php echo count($rows); ?> records</span>
</div>

<?php echo admin_flash_html(); ?>

<div class="row g-4">
    <div class="col-12 <?php echo $selected ? 'col-xl-7' : ''; ?>">
        <div class="card admin-card">
            <div class="card-body table-responsive">
                <table class="table align-middle">
                    <thead><tr><th>#</th><th>Name</th><th>Mobile</th><th>Email</th><th>Subject</th><th>Date</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php echo (int)$row['id']; ?></td>
                            <td><?php echo e((string)$row['full_name']); ?></td>
                            <td><?php echo e((string)$row['mobile']); ?></td>
                            <td><?php echo e((string)$row['email']); ?></td>
                            <td><?php echo e((string)$row['subject']); ?></td>
                            <td><?php echo e((string)$row['enquiry_date']); ?></td>
                            <td>
                                <span class="badge text-bg-<?php echo ((string)$row['status'] === 'Closed') ? 'secondary' : (((int)$row['is_read'] === 1) ? 'success' : 'warning'); ?>">
                                    <?php echo e((string)$row['status']); ?>
                                </span>
                            </td>
                            <td class="text-end text-nowrap">
                                <a class="btn btn-sm btn-outline-primary" href="enquiries.php?view=<?php echo (int)$row['id']; ?>">View</a>
                                <a class="btn btn-sm btn-outline-success" href="enquiries.php?action=read&id=<?php echo (int)$row['id']; ?>">Read</a>
                                <a class="btn btn-sm btn-outline-dark" href="enquiries.php?action=close&id=<?php echo (int)$row['id']; ?>">Close</a>
                                <a class="btn btn-sm btn-outline-danger" href="enquiries.php?action=delete&id=<?php echo (int)$row['id']; ?>" onclick="return confirm('Delete this enquiry?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php if ($selected): ?>
        <div class="col-12 col-xl-5">
            <div class="card admin-card">
                <div class="card-body">
                    <h2 class="h5 mb-3">Enquiry Details</h2>
                    <div class="mb-2"><strong>Name:</strong> <?php echo e((string)$selected['full_name']); ?></div>
                    <div class="mb-2"><strong>Mobile:</strong> <?php echo e((string)$selected['mobile']); ?></div>
                    <div class="mb-2"><strong>Email:</strong> <?php echo e((string)$selected['email']); ?></div>
                    <div class="mb-2"><strong>Subject:</strong> <?php echo e((string)$selected['subject']); ?></div>
                    <div class="mb-2"><strong>Status:</strong> <?php echo e((string)$selected['status']); ?></div>
                    <div class="mb-2"><strong>Message:</strong><br><?php echo nl2br(e((string)$selected['message'])); ?></div>
                    <div class="mb-2"><strong>Date:</strong> <?php echo e((string)$selected['enquiry_date']); ?></div>
                    <a class="btn btn-outline-secondary mt-3" href="enquiries.php">Back</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
