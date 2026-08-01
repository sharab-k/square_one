<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $sourceDir = base_path('Graphic Images');
        $targetDir = public_path('assets/img/graphics');

        if (file_exists($sourceDir) && (!file_exists($targetDir) || count(glob($targetDir . '/*')) < 28)) {
            if (!file_exists($targetDir)) {
                @mkdir($targetDir, 0755, true);
            }
            $files = glob($sourceDir . '/*.{jpeg,jpg,png,JPEG,JPG,PNG}', GLOB_BRACE);
            sort($files);
            $i = 1;
            foreach ($files as $file) {
                $targetFile = $targetDir . '/graphic-' . $i . '.jpg';
                if (!file_exists($targetFile)) {
                    @copy($file, $targetFile);
                }
                $i++;
            }
        }
    }
}
