<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/header.php';
?>
<main class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Gallery</h1>
        <a class="btn btn-primary" href="#">Add Gallery Item</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">Gallery management placeholder connected to the <code>gallery</code> and <code>gallery_images</code> tables.</div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
