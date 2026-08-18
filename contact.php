<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$company = company();
$flash = $_SESSION['contact_flash'] ?? null;
unset($_SESSION['contact_flash']);
?>
<main class="py-5">
  <div class="container py-4">
    <h1 class="fw-bold mb-4">Contact Us</h1>
    <?php if ($flash): ?>
      <div class="alert alert-<?php echo e($flash['type']); ?>"><?php echo e($flash['message']); ?></div>
    <?php endif; ?>
    <div class="row g-4">
      <div class="col-lg-5">
        <div class="p-4 rounded-4 bg-light h-100">
          <h2 class="h5 fw-bold">Get in touch</h2>
          <p class="mb-1"><?php echo e($company['phone'] ?? ''); ?></p>
          <p class="mb-1"><?php echo e($company['email'] ?? ''); ?></p>
          <p class="mb-0"><?php echo e($company['address']['head'] ?? ''); ?></p>
        </div>
      </div>
      <div class="col-lg-7">
        <form action="contact-submit.php" method="post" class="p-4 rounded-4 bg-white shadow-sm">
          <div class="row g-3">
            <div class="col-md-6"><input class="form-control" name="name" placeholder="Your Name" required></div>
            <div class="col-md-6"><input class="form-control" name="phone" placeholder="Phone"></div>
            <div class="col-12"><input class="form-control" name="email" type="email" placeholder="Email"></div>
            <div class="col-12"><textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea></div>
            <div class="col-12"><button class="btn btn-success rounded-pill px-4" type="submit">Send Message</button></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>