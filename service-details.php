<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$services = site_data()['tabs']['verticals'] ?? [];
$service = $services[0] ?? ['title' => 'Service Details', 'desc' => ''];
?>
<main class="py-5">
  <div class="container py-4">
    <h1 class="fw-bold mb-3"><?php echo e($service['title']); ?></h1>
    <p class="text-secondary mb-0"><?php echo e($service['desc']); ?></p>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>