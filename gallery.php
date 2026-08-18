<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$logos = $data['news_logos'] ?? [];
$certs = $data['certifications'] ?? [];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="mb-4">
            <span class="text-uppercase small fw-semibold text-success">Gallery</span>
            <h1 class="fw-bold mb-0">Media, Certifications and Brand Presence</h1>
        </div>

        <div class="row g-3 mb-5">
            <?php foreach ($logos as $logo): ?>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="p-4 rounded-4 bg-light border text-center h-100 d-flex align-items-center justify-content-center fw-semibold"><?php echo e($logo); ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php foreach ($certs as $cert): ?>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-white border h-100 d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center" style="width:44px;height:44px;">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <div class="fw-semibold"><?php echo e($cert); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>