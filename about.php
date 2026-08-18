<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$company = company();
$vision = $data['tabs']['vision'] ?? [];
$plan = $data['tabs']['plan'] ?? [];
$awards = $data['tabs']['awards'] ?? [];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6">
                <span class="badge text-bg-success rounded-pill mb-3">About HeliWind</span>
                <h1 class="display-5 fw-bold mb-3">Powering Tomorrow with Sun & Wind</h1>
                <p class="lead text-secondary mb-4"><?php echo e($company['name'] ?? SITE_NAME); ?> builds clean-energy solutions for homes, businesses, EV charging, and future-ready infrastructure.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-success btn-lg rounded-pill" href="contact.php">Contact Us</a>
                    <a class="btn btn-outline-dark btn-lg rounded-pill" href="services.php">Explore Services</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4 p-md-5 rounded-4 bg-light border h-100">
                    <h2 class="h4 fw-bold mb-3">Company Details</h2>
                    <p class="mb-2"><?php echo e($company['tagline'] ?? ''); ?></p>
                    <p class="mb-2"><?php echo e($company['phone'] ?? ''); ?></p>
                    <p class="mb-2"><?php echo e($company['email'] ?? ''); ?></p>
                    <p class="mb-0"><?php echo e($company['address']['head'] ?? ''); ?></p>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="p-4 rounded-4 bg-white border h-100">
                    <h2 class="h4 fw-bold mb-3">Vision</h2>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <?php foreach ($vision as $item): ?>
                            <li class="d-flex gap-2"><i class="bi bi-check-circle-fill text-success mt-1"></i><span><?php echo e($item); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 rounded-4 bg-white border h-100">
                    <h2 class="h4 fw-bold mb-3">Growth Plan</h2>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <?php foreach ($plan as $item): ?>
                            <li class="d-flex gap-2"><i class="bi bi-arrow-right-circle-fill text-success mt-1"></i><span><?php echo e($item); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 rounded-4 bg-success text-white h-100">
                    <h2 class="h4 fw-bold mb-3">Certifications</h2>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <?php foreach ($awards as $item): ?>
                            <li class="d-flex gap-2"><i class="bi bi-award-fill mt-1"></i><span><?php echo e($item); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>