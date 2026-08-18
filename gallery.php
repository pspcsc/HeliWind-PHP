<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$logos = site_data()['news_logos'] ?? [];
?>
<main class="py-5">
  <div class="container py-4">
    <h1 class="fw-bold mb-4">Gallery</h1>
    <div class="row g-3">
      <?php foreach ($logos as $logo): ?>
        <div class="col-6 col-md-3">
          <div class="p-4 rounded-4 bg-light text-center h-100"><?php echo e($logo); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>