<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$logos = site_data()['news_logos'] ?? [];
?>
<main class="py-5">
  <div class="container py-4">
    <h1 class="fw-bold mb-4">News & Blog</h1>
    <div class="row g-3">
      <?php foreach (array_slice($logos, 0, 6) as $logo): ?>
        <div class="col-md-4"><div class="p-4 rounded-4 bg-light"><?php echo e($logo); ?></div></div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>