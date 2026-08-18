<?php
$logos = site_data()['news_logos'] ?? [];
?>
<section id="news" class="py-5 bg-white">
    <div class="container py-4 py-md-5">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold text-success">in the news</span>
            <h2 class="fw-bold mt-2" style="color:#1E3A5F;">Featured across major media</h2>
            <p class="text-secondary mb-0">Our growth and impact have been recognized by leading publications and platforms.</p>
        </div>
        <div class="row g-3 justify-content-center">
            <?php foreach ($logos as $logo): ?>
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="p-3 rounded-4 border text-center h-100 d-flex align-items-center justify-content-center bg-light fw-semibold text-secondary">
                        <?php echo e($logo); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
