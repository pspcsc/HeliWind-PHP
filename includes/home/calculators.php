<?php ?>
<section id="calculators" class="py-5" style="background:#f5f8f6;">
    <div class="container py-4 py-md-5">
        <div class="text-center mx-auto" style="max-width:760px;">
            <span class="kicker text-uppercase fw-semibold text-success">free tools</span>
            <h2 class="section-title mt-2">Solar System & Battery Backup Calculators</h2>
            <p class="mt-3 text-secondary">Estimate the right solar system size and battery backup requirements for your home or business.</p>
        </div>
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="bg-white rounded-4 p-4 p-md-5 shadow-sm border h-100">
                    <h3 class="h5 fw-bold" style="color:#1E3A5F;">Solar System Size Calculator</h3>
                    <p class="small text-secondary">Monthly Bill (₹) ÷ 8 ÷ 120 × 10</p>
                    <input type="number" class="form-control mt-3" placeholder="Monthly bill" id="billInput">
                    <div class="mt-4 p-3 rounded-4" style="background:#F4FAE8;"><span class="fw-bold" style="color:#4A8B2C;">Recommended: ~ 0 kW</span></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white rounded-4 p-4 p-md-5 shadow-sm border h-100">
                    <h3 class="h5 fw-bold" style="color:#1E3A5F;">Battery Backup Calculator</h3>
                    <p class="small text-secondary">Load (Watts) × 4 ÷ 12</p>
                    <input type="number" class="form-control mt-3" placeholder="Total load" id="loadInput">
                    <div class="mt-4 p-3 rounded-4" style="background:#fff7ea;"><span class="fw-bold" style="color:#F5B921;">Required: ~ 0 Ah</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
