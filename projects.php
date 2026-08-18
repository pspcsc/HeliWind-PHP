<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$stats = site_data()['stats'] ?? [];
?>
<main class="py-5">
  <div class="container py-4">
    <h1 class="fw-bold mb-4">Projects</h1>
    <div class="row g-4">
      <?php foreach ($stats as $stat): ?>
        <div class="col-md-3">
          <div class="p-4 rounded-4 bg-light text-center h-100">
            <div class="display-6 fw-bold text-success"><?php echo (int)$stat['value']; ?><?php echo e($stat['suffix']); ?></div>
            <div class="text-secondary"><?php echo e($stat['label']); ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>