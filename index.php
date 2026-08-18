<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
$company = company();
?>
<main id="home">
    <?php require __DIR__ . '/includes/home/hero.php'; ?>
    <?php require __DIR__ . '/includes/home/about.php'; ?>
    <?php require __DIR__ . '/includes/home/verticals.php'; ?>
    <?php require __DIR__ . '/includes/home/freelancer.php'; ?>
    <?php require __DIR__ . '/includes/home/ev-section.php'; ?>
    <?php require __DIR__ . '/includes/home/savings-calculator.php'; ?>
    <?php require __DIR__ . '/includes/home/calculators.php'; ?>
    <?php require __DIR__ . '/includes/home/why-us.php'; ?>
    <?php require __DIR__ . '/includes/home/partner.php'; ?>
    <?php require __DIR__ . '/includes/home/testimonials.php'; ?>
    <?php require __DIR__ . '/includes/home/stats.php'; ?>
    <?php require __DIR__ . '/includes/home/news.php'; ?>
    <?php require __DIR__ . '/includes/home/certifications.php'; ?>
    <?php require __DIR__ . '/includes/home/contact.php'; ?>
    <?php require __DIR__ . '/includes/home/floating-actions.php'; ?>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
