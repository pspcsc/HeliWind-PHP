<?php $slides = hero_slides(); ?>
<section id="hero" class="position-relative overflow-hidden" style="min-height:88vh;background:#0f172a;">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <?php foreach ($slides as $index => $slide): ?>
                <div class="carousel-item h-100 <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="position-relative h-100" style="min-height:88vh;">
                        <img src="<?php echo e($slide['image']); ?>" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="<?php echo e($slide['title']); ?>">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background:linear-gradient(90deg, rgba(0,0,0,.78) 0%, rgba(0,0,0,.45) 55%, rgba(0,0,0,.12) 100%);"></div>
                        <div class="position-relative z-3 h-100 d-flex align-items-center">
                            <div class="container py-5">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 text-white py-5">
                                        <span class="badge rounded-pill text-bg-warning text-uppercase mb-3"><?php echo e($slide['kicker']); ?></span>
                                        <h1 class="display-4 fw-bold lh-sm" style="font-family:Barlow,Inter,sans-serif;"><?php echo e($slide['title']); ?></h1>
                                        <p class="lead text-white-75 mb-4"><?php echo e($slide['subtitle']); ?></p>
                                        <a class="btn btn-success btn-lg rounded-pill px-4" href="#contact"><?php echo e($slide['cta']); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>
