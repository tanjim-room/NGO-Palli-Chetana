<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $configuredPublicPath = (string) config('app.public_path', 'public');

        // Allow either absolute path or path relative to base_path().
        $this->app->bind('path.public', function () use ($configuredPublicPath) {
            // cPanel usually sets DOCUMENT_ROOT to the actual web-accessible folder.
            $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) : null;

            if (!empty($documentRoot) && is_dir($documentRoot)) {
                return $documentRoot;
            }

            $normalizedConfiguredPath = trim($configuredPublicPath);

            if ($normalizedConfiguredPath === '') {
                $normalizedConfiguredPath = 'public';
            }

            $isAbsoluteUnixPath = strpos($configuredPublicPath, '/') === 0;
            $isAbsoluteWindowsPath = preg_match('/^[A-Za-z]:[\\\\\/]/', $configuredPublicPath) === 1;

            if ($isAbsoluteUnixPath || $isAbsoluteWindowsPath) {
                $absoluteConfiguredPath = rtrim($configuredPublicPath, DIRECTORY_SEPARATOR);

                if (is_dir($absoluteConfiguredPath)) {
                    return $absoluteConfiguredPath;
                }
            }

            $relativeConfiguredPath = rtrim(base_path($normalizedConfiguredPath), DIRECTORY_SEPARATOR);

            if (is_dir($relativeConfiguredPath)) {
                return $relativeConfiguredPath;
            }

            return rtrim(base_path('public'), DIRECTORY_SEPARATOR);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        paginator::useBootstrap();
    }
}
