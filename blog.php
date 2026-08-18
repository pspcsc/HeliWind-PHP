<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$data = site_data();
$logos = $data['news_logos'] ?? [];
$certs = $data['certifications'] ?? [];
?>
<main class="py-5">
    <div class="container py-4 py-md-5">
        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <span class="text-uppercase small fw-semibold text-success">Blog</span>
                <h1 class="fw-bold mb-0">News, Updates and Renewable Energy Insights</h1>
            </div>
            <a href="blog-details.php" class="btn btn-outline-dark rounded-pill">Read Details</a>
        </div>

        <div class="row g-3 mb-5">
            <?php foreach (array_slice($logos, 0, 6) as $logo): ?>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-light border h-100">
                        <div class="small text-uppercase text-secondary fw-semibold mb-2">Featured In</div>
                        <div class="h5 mb-0 fw-bold"><?php echo e($logo); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="p-4 rounded-4 bg-white border h-100">
                    <h2 class="h4 fw-bold mb-3">Latest Highlights</h2>
                    <p class="text-secondary mb-0">Follow the company journey, project updates, business-partner stories, and renewable energy announcements across India.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-4 rounded-4 bg-success text-white h-100">
                    <h2 class="h4 fw-bold mb-3">Certifications</h2>
                    <ul class="list-unstyled mb-0 d-grid gap-2">
                        <?php foreach ($certs as $cert): ?>
                            <li class="d-flex gap-2"><i class="bi bi-award-fill mt-1"></i><span><?php echo e($cert); ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>