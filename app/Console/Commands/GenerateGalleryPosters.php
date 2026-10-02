<?php

namespace App\Console\Commands;

use App\Support\GraphicsGallery;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class GenerateGalleryPosters extends Command
{
    protected $signature = 'gallery:posters {--force : Regenerate posters that already exist}';

    protected $description = 'Grab a still frame from each gallery video so the grid has a thumbnail to show';

    public function handle(GraphicsGallery $gallery): int
    {
        $posterDir = public_path(GraphicsGallery::DIR . '/' . GraphicsGallery::POSTER_DIR);

        if (! is_dir($posterDir) && ! mkdir($posterDir, 0755, true) && ! is_dir($posterDir)) {
            $this->error("Could not create {$posterDir}");

            return self::FAILURE;
        }

        if ($this->option('force')) {
            foreach (glob($posterDir . '/*.jpg') ?: [] as $stale) {
                @unlink($stale);
            }
        }

        $videos = $gallery->videosMissingPosters();

        if ($videos === []) {
            $this->info('Every gallery video already has a poster.');

            return self::SUCCESS;
        }

        $failed = 0;

        foreach ($videos as $path => $posterName) {
            // Seek a second in: the very first frame is often black.
            $process = new Process([
                'ffmpeg', '-y', '-ss', '1', '-i', $path,
                '-frames:v', '1', '-q:v', '4',
                $posterDir . DIRECTORY_SEPARATOR . $posterName,
            ]);
            $process->setTimeout(120);
            $process->run();

            if ($process->isSuccessful()) {
                $this->line("  <info>✓</info> {$posterName}");
            } else {
                $failed++;
                $this->line("  <error>✗</error> {$posterName}");
            }
        }

        $made = count($videos) - $failed;
        $this->newLine();
        $this->info("Generated {$made} poster(s)." . ($failed ? " {$failed} failed — is ffmpeg installed?" : ''));

        return $failed ? self::FAILURE : self::SUCCESS;
    }
}
