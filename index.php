<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$company = company();
?>
<main id="home">
    <section class="py-5" style="background:linear-gradient(135deg,#0F172A,#1E3A5F);color:#fff;">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge rounded-pill text-bg-warning mb-3">welcome to HeliWind Energy</span>
                    <h1 class="display-4 fw-bold" style="font-family:Barlow,Inter,sans-serif;">Clean Energy Solutions for Homes & Businesses</h1>
                    <p class="lead text-white-75">Solar EPC · Wind-hybrid systems · EV charging</p>
                    <a class="btn btn-success btn-lg rounded-pill mt-3" href="#contact">Know More</a>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1761472823286-9f6093ed6663?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDk1Nzl8MHwxfHNlYXJjaHwyfHxzb2xhciUyMHBhbmVscyUyMHJvb2Z0b3B8ZW58MHx8fHwxNzg0NTY4MTIwfDA&ixlib=rb-4.1.0&q=85" class="img-fluid" alt="HeliWind Hero">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="about">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <h2 class="fw-bold" style="color:#1E3A5F;">About HeliWind</h2>
                    <p class="mb-0"><?php echo e($company['name'] ?? SITE_NAME); ?> is built around renewable energy, EV charging, and scalable growth for India.</p>
                </div>
                <div class="col-lg-4">
                    <div class="p-4 rounded-4 bg-light h-100">
                        <div class="fw-semibold">Contact</div>
                        <div><?php echo e($company['phone'] ?? ''); ?></div>
                        <div><?php echo e($company['email'] ?? ''); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
