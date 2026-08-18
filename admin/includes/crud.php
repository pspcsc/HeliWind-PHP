<?php

declare(strict_types=1);

require_once __DIR__ . '/auth.php';

function admin_post(string $key, mixed $default = null): mixed
{
    return $_POST[$key] ?? $default;
}

function admin_get(string $key, mixed $default = null): mixed
{
    return $_GET[$key] ?? $default;
}

function admin_redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function admin_flash(string $type, string $message): void
{
    $_SESSION['admin_flash'] = ['type' => $type, 'message' => $message];
}

function admin_flash_html(): string
{
    if (empty($_SESSION['admin_flash'])) {
        return '';
    }

    $flash = $_SESSION['admin_flash'];
    unset($_SESSION['admin_flash']);

    $type = in_array($flash['type'] ?? 'info', ['success', 'danger', 'warning', 'info'], true) ? $flash['type'] : 'info';
    $message = e((string)($flash['message'] ?? ''));

    return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">' . $message . '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
}

function admin_slug(string $text): string
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text) ?: '';
    return trim($text, '-');
}

function admin_upload(string $field, string $directory = 'uploads/admin'): ?string
{
    if (empty($_FILES[$field]['name'])) {
        return null;
    }

    $file = $_FILES[$field];
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return null;
    }

    $ext = strtolower(pathinfo((string)$file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    if (!in_array($ext, $allowed, true)) {
        return null;
    }

    $targetDir = dirname(__DIR__, 2) . '/' . trim($directory, '/');
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0775, true);
    }

    $fileName = uniqid('img_', true) . '.' . $ext;
    $target = $targetDir . '/' . $fileName;

    if (!move_uploaded_file((string)$file['tmp_name'], $target)) {
        return null;
    }

    return trim($directory, '/') . '/' . $fileName;
}

function admin_delete_upload(?string $relativePath): void
{
    if (!$relativePath) {
        return;
    }

    $fullPath = dirname(__DIR__, 2) . '/' . ltrim($relativePath, '/');
    if (is_file($fullPath)) {
        @unlink($fullPath);
    }
}

function admin_checked(bool $value): string
{
    return $value ? 'checked' : '';
}

function admin_status_from_post(string $key = 'status'): int
{
    return !empty($_POST[$key]) ? 1 : 0;
}

function admin_featured_from_post(string $key = 'featured'): int
{
    return !empty($_POST[$key]) ? 1 : 0;
}
