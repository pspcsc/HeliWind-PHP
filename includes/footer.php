<?php $company = company(); ?>
<footer class="py-5 mt-5" style="background:#0F172A;color:#E2E8F0;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-5">
                <h5 class="fw-bold"><?php echo e($company['name'] ?? SITE_NAME); ?></h5>
                <p class="mb-0"><?php echo e($company['tagline'] ?? ''); ?></p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold">Contact</h6>
                <div class="small">
                    <div><?php echo e($company['phone'] ?? ''); ?></div>
                    <div><?php echo e($company['email'] ?? ''); ?></div>
                    <div><?php echo e($company['address']['head'] ?? ''); ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="fw-semibold">Quick Links</h6>
                <div class="small d-grid gap-1">
                    <?php foreach (nav_links() as $link): ?>
                        <a class="text-decoration-none text-info" href="<?php echo e($link['href']); ?>"><?php echo e($link['label']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <hr class="border-light opacity-25 my-4">
        <div class="d-flex justify-content-between flex-wrap gap-2 small text-white-50">
            <span>© <?php echo date('Y'); ?> <?php echo e($company['name'] ?? SITE_NAME); ?></span>
            <span>PHP 8.2 + MySQL</span>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
