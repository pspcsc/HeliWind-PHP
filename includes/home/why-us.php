<?php $whyUs = site_data()['why_us'] ?? []; ?>
<section id="why-us" class="py-5" style="background:#f5f8f6;">
    <div class="container py-4 py-md-5">
        <div class="text-center mx-auto" style="max-width:720px;">
            <span class="kicker text-uppercase fw-semibold text-success">some convincing factors to</span>
            <h2 class="section-title mt-2">Choose Us</h2>
        </div>
        <div class="row g-4 mt-2">
            <?php foreach ($whyUs as $item): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="bg-white rounded-4 p-4 shadow-sm border h-100">
                        <div class="h-12 w-12 rounded-3 bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3" style="width:48px;height:48px;">
                            <span style="color:#4A8B2C;">★</span>
                        </div>
                        <h3 class="h5 fw-bold" style="color:#1E3A5F;"><?php echo e($item['title']); ?></h3>
                        <p class="small text-secondary mb-0"><?php echo e($item['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
