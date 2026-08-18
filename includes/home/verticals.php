<?php $verticals = site_data()['tabs']['verticals'] ?? []; ?>
<section id="services" class="py-5" style="background:#f5f8f6;">
    <div class="container py-4 py-md-5">
        <div class="text-center mx-auto" style="max-width:720px;">
            <span class="kicker text-uppercase fw-semibold text-success">services</span>
            <h2 class="section-title mt-2">Business Verticals</h2>
            <p class="mt-3 text-secondary">End-to-end renewable energy solutions across solar, mobility and storage.</p>
        </div>
        <div class="row g-4 mt-2">
            <?php foreach ($verticals as $item): ?>
                <div class="col-md-4">
                    <div class="h-100 bg-white rounded-4 p-4 shadow-sm border card-lift">
                        <div class="mb-3">
                            <span class="badge rounded-pill text-bg-success">&#9679;</span>
                        </div>
                        <h3 class="h5 fw-bold" style="color:#1E3A5F;"><?php echo e($item['title']); ?></h3>
                        <p class="text-secondary mb-0 small"><?php echo e($item['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
