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
    return site_data()['hero_slides'] ?? [];
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
