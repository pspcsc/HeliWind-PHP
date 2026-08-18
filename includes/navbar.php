<?php $company = company(); ?>
<header class="site-header sticky-top">
    <div class="topbar d-none d-md-block text-white py-2" style="background:#1E3A5F;">
        <div class="container d-flex justify-content-between align-items-center small">
            <div class="d-flex gap-4 flex-wrap">
                <a class="text-white text-decoration-none" href="tel:<?php echo e($company['phone_raw'] ?? '8544247902'); ?>"><?php echo e($company['phone'] ?? ''); ?></a>
                <a class="text-white text-decoration-none" href="mailto:<?php echo e($company['email'] ?? ''); ?>"><?php echo e($company['email'] ?? ''); ?></a>
                <a class="text-white text-decoration-none" href="https://<?php echo e($company['website'] ?? ''); ?>" target="_blank" rel="noreferrer"><?php echo e($company['website'] ?? ''); ?></a>
            </div>
            <div class="text-white-50">ISO 9001:2015 Certified · Make In India</div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase" href="#home" style="letter-spacing:.08em;color:#1E3A5F;">HeliWind</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto gap-lg-2">
                    <?php foreach (nav_links() as $link): ?>
                        <li class="nav-item"><a class="nav-link fw-semibold" href="<?php echo e($link['href']); ?>"><?php echo e($link['label']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a class="btn btn-success rounded-pill px-4" href="<?php echo e(whatsapp_url('Hi HeliWind, I would like to get a quote.')); ?>" target="_blank" rel="noreferrer">Get Quote</a>
                </div>
            </div>
        </div>
    </nav>
</header>
