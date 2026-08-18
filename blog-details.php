<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$logos = $data['news_logos'] ?? [];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <span class="text-uppercase small fw-semibold text-success">Blog Details</span>
                <h1 class="fw-bold mb-3">Latest renewable energy updates, announcements, and company news</h1>
                <p class="lead text-secondary">Stay updated with project launches, new partnerships, and energy-industry insights from HeliWind.</p>
            </div>
            <div class="col-lg-4">
                <div class="p-4 rounded-4 bg-light border h-100">
                    <h2 class="h5 fw-bold mb-3">Featured Media</h2>
                    <div class="d-grid gap-2">
                        <?php foreach (array_slice($logos, 0, 4) as $logo): ?>
                            <div class="p-3 rounded-3 bg-white border fw-semibold text-center"><?php echo e($logo); ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>