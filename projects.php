<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$stats = $data['stats'] ?? [];
$awards = $data['tabs']['awards'] ?? [];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="row align-items-center g-4 mb-4">
            <div class="col-lg-8">
                <span class="text-uppercase small fw-semibold text-success">Projects</span>
                <h1 class="fw-bold mb-0">Scale, Experience and Delivery</h1>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="gallery.php" class="btn btn-outline-dark rounded-pill">View Gallery</a>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <?php foreach ($stats as $stat): ?>
                <div class="col-md-3">
                    <div class="p-4 rounded-4 bg-white border text-center h-100">
                        <div class="display-6 fw-bold text-success"><?php echo (int)$stat['value']; ?><?php echo e($stat['suffix']); ?></div>
                        <div class="text-secondary"><?php echo e($stat['label']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="p-4 rounded-4 bg-light border h-100">
                    <h2 class="h4 fw-bold mb-3">What we deliver</h2>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <?php foreach ($awards as $item): ?>
                            <li class="d-flex gap-2"><i class="bi bi-check2-circle text-success mt-1"></i><span><?php echo e($item); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4 rounded-4 bg-success text-white h-100">
                    <h2 class="h4 fw-bold mb-3">Project Focus</h2>
                    <p class="mb-0">Solar EPC, hybrid renewable systems, EV charging sites, business-partner expansion, and long-term support for clean-energy adoption.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>