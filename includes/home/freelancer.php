<?php $plans = site_data()['freelancer_plans'] ?? []; ?>
<section id="freelancer" class="py-5 bg-white">
    <div class="container py-4 py-md-5">
        <div class="text-center mx-auto" style="max-width:760px;">
            <span class="kicker text-uppercase fw-semibold text-success">freelancer</span>
            <h2 class="section-title mt-2">Join HeliWind's fastest-expanding renewable-energy network</h2>
            <p class="mt-3 text-secondary">Choose a plan that matches your market ambitions and get guided support from HeliWind.</p>
        </div>
        <div class="row g-4 mt-2">
            <?php foreach ($plans as $plan): ?>
                <div class="col-md-6 col-lg-3">
                    <div class="position-relative h-100 rounded-4 p-4 border card-lift <?php echo !empty($plan['highlight']) ? 'shadow-lg' : 'shadow-sm'; ?>" style="<?php echo !empty($plan['highlight']) ? 'background:#1E3A5F;color:#fff;border-color:#1E3A5F;' : 'background:#fff;'; ?>">
                        <?php if (!empty($plan['highlight'])): ?><div class="position-absolute top-0 start-50 translate-middle badge rounded-pill text-bg-warning text-dark">POPULAR</div><?php endif; ?>
                        <h3 class="h5 fw-bold mt-2"><?php echo e($plan['name']); ?></h3>
                        <div class="mt-3 mb-3">
                            <span class="display-6 fw-bold"><?php echo e($plan['price']); ?></span>
                            <span class="small"><?php echo e($plan['tax']); ?></span>
                        </div>
                        <ul class="small ps-3 mb-0">
                            <?php foreach ($plan['features'] as $feature): ?><li><?php echo e($feature); ?></li><?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
