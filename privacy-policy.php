<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$company = company();
?>
<main class="py-5">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <span class="badge text-bg-success rounded-pill mb-3">Privacy Policy</span>
        <h1 class="display-5 fw-bold mb-4">Your information stays protected</h1>
        <div class="p-4 p-md-5 rounded-4 bg-light border">
          <p class="text-secondary mb-3">We collect only the details required to respond to your enquiry, support your project, and improve our services.</p>
          <ul class="mb-3 text-secondary">
            <li>Contact information submitted through the enquiry form</li>
            <li>Project details shared for consultation or quotation</li>
            <li>Basic technical and analytics data used to keep the website working</li>
          </ul>
          <p class="text-secondary mb-3">We do not sell your information. We use it only for communication, service delivery, and record keeping where required.</p>
          <p class="text-secondary mb-0">For privacy-related questions, contact <?php echo e($company['email'] ?? ''); ?> or call <?php echo e($company['phone'] ?? ''); ?>.</p>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>