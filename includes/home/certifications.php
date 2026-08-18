<?php $certifications = site_data()['certifications'] ?? []; ?>
<section id="certifications" class="py-5 bg-light">
    <div class="container py-4 py-md-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <span class="text-uppercase fw-semibold text-success">certifications</span>
                <h2 class="fw-bold mt-2" style="color:#1E3A5F;">Quality, safety and compliance</h2>
                <p class="text-secondary">A foundation of certification-backed processes helps us deliver projects with consistency and confidence.</p>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    <?php foreach ($certifications as $cert): ?>
                        <div class="col-6 col-md-4">
                            <div class="p-3 rounded-4 bg-white shadow-sm border h-100 d-flex align-items-center justify-content-center text-center fw-semibold" style="min-height:90px;">
                                <?php echo e($cert); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
