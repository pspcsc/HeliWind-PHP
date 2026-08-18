<?php $site = site_data(); $tabs = $site['tabs']; ?>
<section id="about" class="py-5 py-md-5 bg-white">
    <div class="container py-4 py-md-5">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1726866492047-7f9516558c6e?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDk1Nzl8MHwxfHNlYXJjaHwxfHxzb2xhciUyMHBhbmVscyUyMHJvb2Z0b3B8ZW58MHx8fHwxNzg0NTY4MTIwfDA&ixlib=rb-4.1.0&q=85" class="rounded-4 w-100 shadow" alt="solar">
                    <div class="position-absolute bottom-0 end-0 translate-middle-y bg-white rounded-4 shadow p-3 d-none d-md-block" style="max-width:220px;">
                        <img src="https://images.unsplash.com/photo-1668097613572-40b7c11c8727?crop=entropy&cs=srgb&fm=jpg&ixid=M3w4NjAxODF8MHwxfHNlYXJjaHwyfHxzb2xhciUyMGluc3RhbGxhdGlvbnxlbnwwfHx8fDE3ODQ1NjgxMjB8MA&ixlib=rb-4.1.0&q=85" class="rounded-3 w-100 mb-2" alt="installation">
                        <div class="small text-uppercase fw-semibold text-muted">Vision 2025</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="kicker text-uppercase fw-semibold text-success">about</span>
                <h2 class="section-title mt-2">Powering Tomorrow with Sun & Wind</h2>
                <p class="mt-3 text-secondary">HeliWind Energy Solution is built around renewable energy, EV charging, and scalable growth for India.</p>

                <div class="row g-3 mt-4">
                    <div class="col-md-6"><div class="p-4 rounded-4 border h-100"><h5 class="fw-bold" style="color:#1E3A5F;">Vision 2025</h5><ul class="mb-0 small text-secondary ps-3"><?php foreach ($tabs['vision'] as $item): ?><li><?php echo e($item); ?></li><?php endforeach; ?></ul></div></div>
                    <div class="col-md-6"><div class="p-4 rounded-4 border h-100"><h5 class="fw-bold" style="color:#1E3A5F;">Plan 2030</h5><ul class="mb-0 small text-secondary ps-3"><?php foreach ($tabs['plan'] as $item): ?><li><?php echo e($item); ?></li><?php endforeach; ?></ul></div></div>
                </div>
            </div>
        </div>
    </div>
</section>
