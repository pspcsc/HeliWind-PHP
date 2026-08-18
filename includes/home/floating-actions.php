<?php $company = company(); ?>
<div class="floating-actions">
    <a class="floating-btn whatsapp" href="<?php echo e(whatsapp_url('Hi HeliWind, I want to know more about your services.')); ?>" target="_blank" rel="noreferrer" aria-label="WhatsApp">
        WhatsApp
    </a>
    <a class="floating-btn call" href="tel:<?php echo e($company['phone_raw'] ?? '8544247902'); ?>" aria-label="Call">
        Call
    </a>
</div>
