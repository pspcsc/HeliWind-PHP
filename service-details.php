<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$services = $data['tabs']['verticals'] ?? [];
$service = $services[0] ?? ['title' => 'Service Details', 'desc' => ''];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="text-uppercase small fw-semibold text-success">Service Details</span>
                <h1 class="fw-bold mb-3"><?php echo e($service['title']); ?></h1>
                <p class="lead text-secondary mb-0"><?php echo e($service['desc']); ?></p>
            </div>
            <div class="col-lg-5">
                <div class="p-4 rounded-4 bg-light border">
                    <h2 class="h5 fw-bold mb-3">Book a consultation</h2>
                    <p class="text-secondary mb-0">Solar EPC, EV charging, storage and hybrid energy planning for homes, businesses and industries.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>