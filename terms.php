<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$company = company();
?>
<main class="py-5">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <span class="badge text-bg-success rounded-pill mb-3">Terms & Conditions</span>
        <h1 class="display-5 fw-bold mb-4">Use this website responsibly</h1>
        <div class="p-4 p-md-5 rounded-4 bg-light border">
          <p class="text-secondary mb-3">By accessing this website, you agree to use the information only for lawful purposes and for personal or business evaluation of our services.</p>
          <ul class="mb-3 text-secondary">
            <li>Website content may change without prior notice</li>
            <li>Quotation and project timelines depend on site conditions and approvals</li>
            <li>All brand names, logos, and content remain the property of their respective owners</li>
          </ul>
          <p class="text-secondary mb-3">We work to keep information accurate, but we do not guarantee uninterrupted availability or error-free content at all times.</p>
          <p class="text-secondary mb-0">For questions, contact <?php echo e($company['email'] ?? ''); ?>.</p>
        </div>
      </div>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>