<?php $stats = site_data()['stats'] ?? []; ?>
<section id="stats" class="py-5" style="background:linear-gradient(135deg,#0F172A,#1E3A5F);color:#fff;">
    <div class="container py-3 py-md-4">
        <div class="row g-4 text-center">
            <?php foreach ($stats as $stat): ?>
                <div class="col-6 col-lg-3">
                    <div class="p-4 rounded-4 border border-white border-opacity-10 bg-white bg-opacity-10 h-100">
                        <div class="display-5 fw-bold"><?php echo e((string)$stat['value']); ?><?php echo e($stat['suffix'] ?? ''); ?></div>
                        <div class="small text-uppercase text-white-50 mt-2"><?php echo e($stat['label']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
