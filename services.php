<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$services = site_data()['tabs']['verticals'] ?? [];
?>
<main class="py-5">
  <div class="container py-4">
    <h1 class="fw-bold mb-4">Services</h1>
    <div class="row g-4">
      <?php foreach ($services as $service): ?>
        <div class="col-md-4">
          <div class="p-4 rounded-4 bg-light h-100">
            <h2 class="h5 fw-bold"><?php echo e($service['title']); ?></h2>
            <p class="mb-0 text-secondary"><?php echo e($service['desc']); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>