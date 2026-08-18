<?php

declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function site_data(): array
{
    static $data;

    if ($data === null) {
        $data = $GLOBALS['siteData'] ?? [];
    }

    return $data;
}

function company(): array
{
    return site_data()['company'] ?? [];
}

function nav_links(): array
{
    return site_data()['nav_links'] ?? [];
}

function hero_slides(): array
{
    static $slides;

    if ($slides !== null) {
        return $slides;
    }

    $fallback = site_data()['hero_slides'] ?? [];

    if (function_exists('fetchAllRows')) {
        try {
            $rows = fetchAllRows(
                'SELECT title, subtitle, button_text, button_link, image, mobile_image, sort_order FROM hero_slides WHERE status = 1 ORDER BY sort_order ASC, id ASC'
            );

            if (!empty($rows)) {
                $slides = array_map(static function (array $row): array {
                    return [
                        'kicker' => 'HeliWind Energy Solution',
                        'title' => (string)($row['title'] ?? ''),
                        'subtitle' => (string)($row['subtitle'] ?? ''),
                        'cta' => trim((string)($row['button_text'] ?? '')) ?: 'Know More',
                        'button_link' => trim((string)($row['button_link'] ?? '')) ?: '#contact',
                        'image' => (string)($row['image'] ?? ''),
                        'mobile_image' => (string)($row['mobile_image'] ?? ''),
                        'sort_order' => (int)($row['sort_order'] ?? 0),
                    ];
                }, $rows);

                return $slides;
            }
        } catch (Throwable $e) {
            // Fallback to static content below.
        }
    }

    $slides = $fallback;
    return $slides;
}

function whatsapp_url(string $message = 'Hi HeliWind, I would like more details.'): string
{
    $phone = company()['phone_raw'] ?? '8544247902';
    return 'https://wa.me/91' . $phone . '?text=' . rawurlencode($message);
}

function asset_url(string $path): string
{
    return rtrim(ASSET_URL, '/') . '/' . ltrim($path, '/');
}

function section_id(string $id): string
{
    return preg_replace('/[^a-z0-9\-]/', '', strtolower($id));
}

function csrf_token(string $scope = 'default'): string
{
    if (empty($_SESSION['_csrf']) || !is_array($_SESSION['_csrf'])) {
        $_SESSION['_csrf'] = [];
    }

    if (empty($_SESSION['_csrf'][$scope]) || !is_string($_SESSION['_csrf'][$scope])) {
        $_SESSION['_csrf'][$scope] = bin2hex(random_bytes(32));
    }

    return $_SESSION['_csrf'][$scope];
}

function csrf_field(string $scope = 'default'): string
{
    return '<input type="hidden" name="_csrf" value="' . e(csrf_token($scope)) . '">';
}

function csrf_verify(string $scope, ?string $token): bool
{
    if ($token === null || $token === '') {
        return false;
    }

    $stored = $_SESSION['_csrf'][$scope] ?? '';
    return is_string($stored) && hash_equals($stored, $token);
}
