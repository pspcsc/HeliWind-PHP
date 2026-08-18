<?php $testimonials = site_data()['testimonials'] ?? []; ?>
<section id="testimonials" class="py-5 bg-light">
    <div class="container py-4 py-md-5">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold text-success">what people say</span>
            <h2 class="fw-bold mt-2" style="color:#1E3A5F;">Trusted by partners across India</h2>
            <p class="text-secondary mb-0">Real journeys from professionals who joined HeliWind Energy Solution.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($testimonials as $item): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width:52px;height:52px;">
                                    <?php echo e(substr($item['name'], 0, 1)); ?>
                                </div>
                                <div>
                                    <div class="fw-bold"><?php echo e($item['name']); ?></div>
                                    <div class="text-secondary small"><?php echo e($item['location']); ?></div>
                                </div>
                            </div>
                            <p class="mb-0 text-secondary"><?php echo e($item['text']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
