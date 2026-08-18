<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$services = $data['tabs']['verticals'] ?? [];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <span class="text-uppercase small fw-semibold text-success">Our Services</span>
                <h1 class="fw-bold mb-0">Solar EPC, EV Charging & Energy Storage</h1>
            </div>
            <a href="contact.php" class="btn btn-outline-dark rounded-pill">Request a Quote</a>
        </div>

        <div class="row g-4">
            <?php foreach ($services as $service): ?>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-light h-100 border">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success text-white mb-3" style="width:48px;height:48px;">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h2 class="h5 fw-bold"><?php echo e($service['title']); ?></h2>
                        <p class="mb-0 text-secondary"><?php echo e($service['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>