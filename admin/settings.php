<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/crud.php';

require_admin();

$settings = fetchOne('SELECT * FROM site_settings ORDER BY id ASC LIMIT 1') ?: [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payload = [
        'site_name' => trim((string)admin_post('site_name', '')),
        'tagline' => trim((string)admin_post('tagline', '')),
        'company_name' => trim((string)admin_post('company_name', '')),
        'email' => trim((string)admin_post('email', '')),
        'phone' => trim((string)admin_post('phone', '')),
        'whatsapp' => trim((string)admin_post('whatsapp', '')),
        'website' => trim((string)admin_post('website', '')),
        'address' => trim((string)admin_post('address', '')),
        'copyright' => trim((string)admin_post('copyright', '')),
        'meta_title' => trim((string)admin_post('meta_title', '')),
        'meta_description' => trim((string)admin_post('meta_description', '')),
        'meta_keywords' => trim((string)admin_post('meta_keywords', '')),
        'facebook' => trim((string)admin_post('facebook', '')),
        'instagram' => trim((string)admin_post('instagram', '')),
        'linkedin' => trim((string)admin_post('linkedin', '')),
        'youtube' => trim((string)admin_post('youtube', '')),
        'twitter' => trim((string)admin_post('twitter', '')),
        'google_map' => trim((string)admin_post('google_map', '')),
        'status' => admin_status_from_post(),
    ];

    if (!empty($settings['id'])) {
        $payload['id'] = (int)$settings['id'];
        executeQuery(
            'UPDATE site_settings SET site_name = :site_name, tagline = :tagline, company_name = :company_name, email = :email, phone = :phone, whatsapp = :whatsapp, website = :website, address = :address, copyright = :copyright, meta_title = :meta_title, meta_description = :meta_description, meta_keywords = :meta_keywords, facebook = :facebook, instagram = :instagram, linkedin = :linkedin, youtube = :youtube, twitter = :twitter, google_map = :google_map, status = :status WHERE id = :id',
            $payload
        );
        admin_flash('success', 'Settings updated successfully.');
    } else {
        executeQuery(
            'INSERT INTO site_settings (site_name, tagline, company_name, email, phone, whatsapp, website, address, copyright, meta_title, meta_description, meta_keywords, facebook, instagram, linkedin, youtube, twitter, google_map, status) VALUES (:site_name, :tagline, :company_name, :email, :phone, :whatsapp, :website, :address, :copyright, :meta_title, :meta_description, :meta_keywords, :facebook, :instagram, :linkedin, :youtube, :twitter, :google_map, :status)',
            $payload
        );
        admin_flash('success', 'Settings created successfully.');
    }

    admin_redirect('settings.php');
}

$pageTitle = 'Settings';
require __DIR__ . '/includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h4 mb-1">Site Settings</h1>
        <div class="text-muted">Edit branding, contact, and SEO details.</div>
    </div>
</div>

<?php echo admin_flash_html(); ?>

<div class="card admin-card">
    <div class="card-body">
        <form method="post" class="row g-3">
            <div class="col-md-6"><label class="form-label">Site Name</label><input class="form-control" name="site_name" value="<?php echo e((string)($settings['site_name'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Company Name</label><input class="form-control" name="company_name" value="<?php echo e((string)($settings['company_name'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Tagline</label><input class="form-control" name="tagline" value="<?php echo e((string)($settings['tagline'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Website</label><input class="form-control" name="website" value="<?php echo e((string)($settings['website'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Email</label><input class="form-control" name="email" value="<?php echo e((string)($settings['email'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Phone</label><input class="form-control" name="phone" value="<?php echo e((string)($settings['phone'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">WhatsApp</label><input class="form-control" name="whatsapp" value="<?php echo e((string)($settings['whatsapp'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Copyright</label><input class="form-control" name="copyright" value="<?php echo e((string)($settings['copyright'] ?? '')); ?>"></div>
            <div class="col-12"><label class="form-label">Address</label><textarea class="form-control" name="address" rows="3"><?php echo e((string)($settings['address'] ?? '')); ?></textarea></div>
            <div class="col-12"><label class="form-label">Meta Title</label><input class="form-control" name="meta_title" value="<?php echo e((string)($settings['meta_title'] ?? '')); ?>"></div>
            <div class="col-12"><label class="form-label">Meta Description</label><textarea class="form-control" name="meta_description" rows="2"><?php echo e((string)($settings['meta_description'] ?? '')); ?></textarea></div>
            <div class="col-12"><label class="form-label">Meta Keywords</label><textarea class="form-control" name="meta_keywords" rows="2"><?php echo e((string)($settings['meta_keywords'] ?? '')); ?></textarea></div>
            <div class="col-md-6"><label class="form-label">Facebook</label><input class="form-control" name="facebook" value="<?php echo e((string)($settings['facebook'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Instagram</label><input class="form-control" name="instagram" value="<?php echo e((string)($settings['instagram'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">LinkedIn</label><input class="form-control" name="linkedin" value="<?php echo e((string)($settings['linkedin'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">YouTube</label><input class="form-control" name="youtube" value="<?php echo e((string)($settings['youtube'] ?? '')); ?>"></div>
            <div class="col-md-6"><label class="form-label">Twitter</label><input class="form-control" name="twitter" value="<?php echo e((string)($settings['twitter'] ?? '')); ?>"></div>
            <div class="col-12"><label class="form-label">Google Map Embed</label><textarea class="form-control" name="google_map" rows="3"><?php echo e((string)($settings['google_map'] ?? '')); ?></textarea></div>
            <div class="col-12 form-check ms-2">
                <input class="form-check-input" type="checkbox" name="status" value="1" <?php echo !empty($settings['status']) ? 'checked' : ''; ?>>
                <label class="form-check-label">Active</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save Settings</button>
            </div>
        </form>
    </div>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
