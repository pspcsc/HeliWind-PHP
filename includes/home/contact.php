<?php $company = company(); ?>
<section id="contact" class="py-5 bg-white">
    <div class="container py-4 py-md-5">
        <div class="row g-5">
            <div class="col-lg-5">
                <span class="text-uppercase fw-semibold text-success">contact us</span>
                <h2 class="fw-bold mt-2" style="color:#1E3A5F;">Let’s build your clean energy project</h2>
                <p class="text-secondary">Reach out for solar EPC, EV charging, business partnerships, or freelancer opportunities.</p>
                <div class="d-grid gap-3">
                    <div class="p-4 rounded-4 bg-light border">
                        <div class="fw-semibold text-uppercase small text-secondary">Phone</div>
                        <div class="fs-5 fw-bold"><?php echo e($company['phone'] ?? ''); ?></div>
                    </div>
                    <div class="p-4 rounded-4 bg-light border">
                        <div class="fw-semibold text-uppercase small text-secondary">Email</div>
                        <div class="fs-5 fw-bold"><?php echo e($company['email'] ?? ''); ?></div>
                    </div>
                    <div class="p-4 rounded-4 bg-light border">
                        <div class="fw-semibold text-uppercase small text-secondary">Address</div>
                        <div class="fs-5 fw-bold"><?php echo e($company['address']['head'] ?? ''); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold mb-4">Send a message</h5>

                        <?php if (!empty($_SESSION['contact_flash'])): ?>
                            <?php $flash = $_SESSION['contact_flash']; unset($_SESSION['contact_flash']); ?>
                            <div class="alert alert-<?php echo e((string)($flash['type'] ?? 'info')); ?> mb-4" role="alert">
                                <?php echo e((string)($flash['message'] ?? '')); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/contact-submit.php" method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input class="form-control form-control-lg" type="text" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Your Email">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-lg" type="tel" name="phone" placeholder="Mobile Number" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-lg" type="text" name="subject" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" name="message" placeholder="Tell us about your project" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">Submit Enquiry</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
