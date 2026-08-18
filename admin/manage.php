<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/crud.php';

$configs = require __DIR__ . '/includes/content-config.php';
$entity = (string)admin_get('entity', 'blogs');
if (!isset($configs[$entity])) {
    $entity = 'blogs';
}

$config = $configs[$entity];
$table = $config['table'];
$pk = $config['pk'];
$fields = $config['fields'];
$pageTitle = $config['label'];

function admin_field_value(array $row, string $field): string
{
    return (string)($row[$field] ?? '');
}

function admin_fetch_item(PDO $pdo, string $table, string $pk, int $id): ?array
{
    $stmt = $pdo->prepare("SELECT * FROM {$table} WHERE {$pk} = :id LIMIT 1");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function admin_delete_record(PDO $pdo, array $config, int $id): void
{
    $table = $config['table'];
    $pk = $config['pk'];
    $fields = $config['fields'];

    $existing = admin_fetch_item($pdo, $table, $pk, $id);
    if (!$existing) {
        return;
    }

    foreach ($fields as $name => $meta) {
        if (($meta['type'] ?? '') === 'image' && !empty($existing[$name])) {
            admin_delete_upload((string)$existing[$name]);
        }
    }

    $stmt = $pdo->prepare("DELETE FROM {$table} WHERE {$pk} = :id");
    $stmt->execute(['id' => $id]);
}

$editing = null;
if (admin_get('edit')) {
    $editing = admin_fetch_item($pdo, $table, $pk, (int)admin_get('edit'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)admin_post($pk, 0);
    $existing = $id ? admin_fetch_item($pdo, $table, $pk, $id) : null;

    $data = [];
    foreach ($fields as $name => $meta) {
        $type = $meta['type'] ?? 'text';

        if ($type === 'checkbox') {
            $data[$name] = !empty($_POST[$name]) ? 1 : 0;
            continue;
        }

        if ($type === 'image') {
            $uploaded = admin_upload($name);
            if ($uploaded) {
                if ($existing && !empty($existing[$name])) {
                    admin_delete_upload((string)$existing[$name]);
                }
                $data[$name] = $uploaded;
            } elseif ($existing) {
                $data[$name] = (string)($existing[$name] ?? '');
            } else {
                $data[$name] = null;
            }
            continue;
        }

        $value = trim((string)admin_post($name, ''));
        if (($meta['auto_slug_from'] ?? '') !== '' && $value === '') {
            $source = trim((string)admin_post((string)$meta['auto_slug_from'], ''));
            $value = admin_slug($source);
        }
        $data[$name] = $value;
    }

    if (isset($data['slug']) && $data['slug'] === '' && isset($data['title'])) {
        $data['slug'] = admin_slug((string)$data['title']);
    }
    if (isset($data['slug']) && $data['slug'] === '' && isset($data['service_name'])) {
        $data['slug'] = admin_slug((string)$data['service_name']);
    }
    if (isset($data['slug']) && $data['slug'] === '' && isset($data['project_name'])) {
        $data['slug'] = admin_slug((string)$data['project_name']);
    }

    $columns = array_keys($data);
    $placeholders = array_map(fn($c) => ':' . $c, $columns);

    if ($id > 0) {
        $set = implode(', ', array_map(fn($c) => "{$c} = :{$c}", $columns));
        $sql = "UPDATE {$table} SET {$set} WHERE {$pk} = :{$pk}";
        $stmt = $pdo->prepare($sql);
        foreach ($data as $k => $v) {
            $stmt->bindValue(':' . $k, $v);
        }
        $stmt->bindValue(':' . $pk, $id, PDO::PARAM_INT);
        $stmt->execute();
        admin_flash('success', ucfirst($config['label']) . ' updated successfully.');
    } else {
        $sql = "INSERT INTO {$table} (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ")";
        $stmt = $pdo->prepare($sql);
        foreach ($data as $k => $v) {
            $stmt->bindValue(':' . $k, $v);
        }
        $stmt->execute();
        admin_flash('success', ucfirst($config['label']) . ' added successfully.');
    }

    admin_redirect('manage.php?entity=' . urlencode($entity));
}

if (admin_get('delete')) {
    admin_delete_record($pdo, $config, (int)admin_get('delete'));
    admin_flash('success', ucfirst($config['label']) . ' deleted successfully.');
    admin_redirect('manage.php?entity=' . urlencode($entity));
}

$rows = $pdo->query("SELECT * FROM {$table} ORDER BY {$pk} DESC LIMIT 100")->fetchAll();

require_once __DIR__ . '/includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1"><?php echo e($pageTitle); ?></h1>
        <div class="text-muted">Create, update, and delete <?php echo e($config['label']); ?> items.</div>
    </div>
    <a class="btn btn-outline-secondary" href="manage.php?entity=<?php echo e($entity); ?>">Refresh</a>
</div>

<?php echo admin_flash_html(); ?>

<div class="row g-4">
    <div class="col-12 col-xl-5">
        <div class="card admin-card">
            <div class="card-body">
                <h2 class="h5 mb-3"><?php echo $editing ? 'Edit' : 'Add'; ?> <?php echo e($config['label']); ?></h2>
                <form method="post" enctype="multipart/form-data" class="row g-3">
                    <?php if ($editing): ?>
                        <input type="hidden" name="<?php echo e($pk); ?>" value="<?php echo (int)$editing[$pk]; ?>">
                    <?php endif; ?>

                    <?php foreach ($fields as $name => $meta): ?>
                        <?php $type = $meta['type'] ?? 'text'; $value = $editing[$name] ?? ($type === 'checkbox' ? 0 : ''); ?>
                        <div class="col-12">
                            <label class="form-label"><?php echo e($meta['label'] ?? $name); ?></label>
                            <?php if ($type === 'textarea'): ?>
                                <textarea name="<?php echo e($name); ?>" class="form-control" rows="4"><?php echo e((string)$value); ?></textarea>
                            <?php elseif ($type === 'image'): ?>
                                <input type="file" name="<?php echo e($name); ?>" class="form-control" accept="image/*">
                                <?php if ($editing && !empty($editing[$name])): ?>
                                    <div class="small text-muted mt-2">Current: <?php echo e((string)$editing[$name]); ?></div>
                                <?php endif; ?>
                            <?php elseif ($type === 'checkbox'): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="<?php echo e($name); ?>" value="1" <?php echo !empty($value) ? 'checked' : ''; ?>>
                                    <label class="form-check-label"><?php echo e($meta['label'] ?? $name); ?></label>
                                </div>
                            <?php elseif ($type === 'number'): ?>
                                <input type="number" name="<?php echo e($name); ?>" class="form-control" value="<?php echo e((string)$value); ?>">
                            <?php elseif ($type === 'date'): ?>
                                <input type="date" name="<?php echo e($name); ?>" class="form-control" value="<?php echo e((string)$value); ?>">
                            <?php else: ?>
                                <input type="text" name="<?php echo e($name); ?>" class="form-control" value="<?php echo e((string)$value); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-12 d-flex gap-2">
                        <button class="btn btn-primary" type="submit"><?php echo $editing ? 'Update' : 'Save'; ?></button>
                        <?php if ($editing): ?>
                            <a class="btn btn-outline-secondary" href="manage.php?entity=<?php echo e($entity); ?>">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-7">
        <div class="card admin-card">
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                            <?php
                                $titleField = array_key_exists('title', $row) ? 'title' : (array_key_exists('customer_name', $row) ? 'customer_name' : (array_key_exists('service_name', $row) ? 'service_name' : 'project_name'));
                                if (!isset($row[$titleField])) {
                                    $titleField = $pk;
                                }
                            ?>
                            <tr>
                                <td><?php echo (int)$row[$pk]; ?></td>
                                <td><?php echo e((string)($row[$titleField] ?? '')); ?></td>
                                <td>
                                    <span class="badge text-bg-<?php echo !empty($row['status']) ? 'success' : 'secondary'; ?>">
                                        <?php echo !empty($row['status']) ? 'Active' : 'Inactive'; ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-primary" href="manage.php?entity=<?php echo e($entity); ?>&edit=<?php echo (int)$row[$pk]; ?>">Edit</a>
                                    <a class="btn btn-sm btn-outline-danger" href="manage.php?entity=<?php echo e($entity); ?>&delete=<?php echo (int)$row[$pk]; ?>" onclick="return confirm('Delete this item?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
