<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$company = company();
?>
<main class="py-5">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="badge text-bg-success rounded-pill mb-3">About HeliWind</span>
        <h1 class="display-5 fw-bold">Powering Tomorrow with Sun & Wind</h1>
        <p class="lead text-secondary"><?php echo e($company['name'] ?? SITE_NAME); ?> builds clean-energy solutions for homes, businesses, EV charging, and future-ready infrastructure.</p>
      </div>
      <div class="col-lg-6">
        <div class="p-4 rounded-4 bg-light">
          <h2 class="h4 fw-bold">Company Details</h2>
          <p class="mb-1"><?php echo e($company['tagline'] ?? ''); ?></p>
          <p class="mb-1"><?php echo e($company['phone'] ?? ''); ?></p>
          <p class="mb-1"><?php echo e($company['email'] ?? ''); ?></p>
          <p class="mb-0"><?php echo e($company['address']['head'] ?? ''); ?></p>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>