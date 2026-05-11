<?php

use Illuminate\Support\Facades\DB;

function application()
{
    return DB::table('applications')->first();
}

function topbar_contact()
{
    return DB::table('contacts')
        ->where('status', 'active')
        ->whereIn('type', ['head_office', 'branch'])
        ->orderByRaw("CASE WHEN type = 'head_office' THEN 0 ELSE 1 END")
        ->first();
}

function main_logo_url()
{
    $app = application();

    if (!empty($app) && !empty($app->main_logo)) {
        $logoPath = public_path('images/application/' . $app->main_logo);

        if (file_exists($logoPath)) {
            return asset('images/application/' . $app->main_logo);
        }
    }

    return asset('images/application/logo.png');
}

function public_storage_url($path)
{
    if (empty($path)) {
        return null;
    }

    $normalizedPath = ltrim($path, '/');

    // Standard Laravel symlink/public mapping.
    if (file_exists(public_path('storage/' . $normalizedPath))) {
        return asset('storage/' . $normalizedPath);
    }

    // Shared-host fallback where project root is web root.
    if (file_exists(base_path('storage/app/public/' . $normalizedPath))) {
        return asset('storage/app/public/' . $normalizedPath);
    }

    // Public images fallback used by legacy/admin upload flows.
    if (file_exists(public_path('images/' . $normalizedPath))) {
        return asset('images/' . $normalizedPath);
    }

    // Prefer canonical public URL when file checks are inconclusive.
    return asset('storage/' . $normalizedPath);
}









