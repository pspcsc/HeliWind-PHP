<?php ?>
<section id="savings" class="py-5" style="background:#F6FBEF;">
    <div class="container py-4 py-md-5">
        <div class="text-center mx-auto" style="max-width:720px;">
            <span class="kicker text-uppercase fw-semibold text-success">savings</span>
            <h2 class="section-title mt-2">Savings Calculator</h2>
            <p class="mt-3 text-secondary">Estimate solar savings and battery backup needs for your home or business.</p>
        </div>
        <div class="row g-4 align-items-stretch mt-2">
            <div class="col-lg-6">
                <div class="bg-white rounded-4 p-4 p-md-5 border h-100 shadow-sm">
                    <div class="fw-bold mb-2" style="color:#1E3A5F;">Monthly electricity bill (₹)</div>
                    <input type="number" class="form-control form-control-lg" placeholder="e.g. 4000" id="solarBill">
                    <div class="mt-4 p-4 rounded-4" style="background:#F4FAE8;">
                        <div class="text-uppercase small text-muted fw-semibold">Recommended solar size</div>
                        <div class="display-6 fw-bold" style="color:#4A8B2C;">~ 0 kW</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-white rounded-4 p-4 p-md-5 border h-100 shadow-sm">
                    <div class="fw-bold mb-2" style="color:#1E3A5F;">Total load (Watts)</div>
                    <input type="number" class="form-control form-control-lg" placeholder="e.g. 500" id="batteryLoad">
                    <div class="mt-4 p-4 rounded-4" style="background:#fff7ea;">
                        <div class="text-uppercase small text-muted fw-semibold">Battery backup estimate</div>
                        <div class="display-6 fw-bold" style="color:#F5B921;">~ 0 Ah</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
