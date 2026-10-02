<?php

namespace App\Support;

class GraphicsGallery
{
    /**
     * Folder (relative to public/) that holds the gallery images.
     * Drop files straight in here, or into a subfolder to group them
     * under a category — the subfolder name becomes the filter label.
     */
    public const DIR = 'assets/img/graphics';

    /** Where `php artisan gallery:posters` writes video thumbnails (relative to DIR). */
    public const POSTER_DIR = 'posters';

    protected const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp', 'avif', 'gif'];

    protected const VIDEO_EXTENSIONS = ['mp4', 'webm', 'mov', 'm4v'];

    /** Fallback category for files dropped in the folder root. */
    protected const DEFAULT_CATEGORY = 'design';

    /**
     * Every image and video in the gallery folder.
     *
     * @return list<array{src: string, type: string, poster: ?string, title: string, category: string, label: string}>
     */
    public function items(): array
    {
        $root = public_path(self::DIR);

        if (! is_dir($root)) {
            return [];
        }

        $items = [];

        foreach ($this->files($root) as $path) {
            $relative = str_replace(DIRECTORY_SEPARATOR, '/', substr($path, strlen($root) + 1));
            $folder = dirname($relative);
            $category = $folder === '.' ? self::DEFAULT_CATEGORY : $this->slug($folder);
            $isVideo = $this->isVideo($relative);

            $items[] = [
                'src' => asset(self::DIR . '/' . $this->encodePath($relative)),
                'type' => $isVideo ? 'video' : 'image',
                'poster' => $isVideo ? $this->poster($relative) : null,
                'title' => $this->title($relative),
                'category' => $category,
                'label' => $this->label($category),
            ];
        }

        return $items;
    }

    protected function isVideo(string $relative): bool
    {
        return in_array(strtolower(pathinfo($relative, PATHINFO_EXTENSION)), self::VIDEO_EXTENSIONS, true);
    }

    /**
     * Poster image for a video, if one has been generated. Falls back to null,
     * in which case the browser renders the first frame instead.
     */
    protected function poster(string $relative): ?string
    {
        $name = $this->posterName($relative);

        if (! is_file(public_path(self::DIR . '/' . self::POSTER_DIR . '/' . $name))) {
            return null;
        }

        return asset(self::DIR . '/' . self::POSTER_DIR . '/' . rawurlencode($name));
    }

    /** "Video/video-01.mp4" -> "Video__video-01.jpg" */
    public function posterName(string $relative): string
    {
        return str_replace('/', '__', pathinfo($relative, PATHINFO_DIRNAME) === '.'
            ? pathinfo($relative, PATHINFO_FILENAME)
            : pathinfo($relative, PATHINFO_DIRNAME) . '/' . pathinfo($relative, PATHINFO_FILENAME)) . '.jpg';
    }

    /**
     * Categories actually present, each with how many images it holds.
     * Used to build the filter bar, so it never drifts from the files.
     *
     * @return list<array{category: string, label: string, count: int}>
     */
    public function categories(): array
    {
        $counts = [];

        foreach ($this->items() as $item) {
            $counts[$item['category']] ??= ['category' => $item['category'], 'label' => $item['label'], 'count' => 0];
            $counts[$item['category']]['count']++;
        }

        ksort($counts);

        return array_values($counts);
    }

    /**
     * All image files under $root, recursing one level into category folders.
     *
     * @return list<string>
     */
    protected function files(string $root): array
    {
        $extensions = array_merge(self::IMAGE_EXTENSIONS, self::VIDEO_EXTENSIONS);
        $pattern = '/*.{' . implode(',', array_merge(
            $extensions,
            array_map('strtoupper', $extensions),
        )) . '}';

        $files = array_merge(
            glob($root . $pattern, GLOB_BRACE) ?: [],
            glob($root . '/*' . $pattern, GLOB_BRACE) ?: [],
        );

        // The generated poster thumbnails are not gallery items themselves.
        $posters = str_replace('\\', '/', $root) . '/' . self::POSTER_DIR . '/';
        $files = array_filter(
            $files,
            fn ($file) => ! str_starts_with(str_replace('\\', '/', $file), $posters),
        );

        // Natural sort so graphic-2 lands before graphic-10.
        natcasesort($files);

        return array_values($files);
    }

    /**
     * Videos that still need a poster generated, as [absolute path => poster filename].
     *
     * @return array<string, string>
     */
    public function videosMissingPosters(): array
    {
        $root = public_path(self::DIR);
        $missing = [];

        if (! is_dir($root)) {
            return $missing;
        }

        foreach ($this->files($root) as $path) {
            $relative = str_replace(DIRECTORY_SEPARATOR, '/', substr($path, strlen($root) + 1));

            if ($this->isVideo($relative) && $this->poster($relative) === null) {
                $missing[$path] = $this->posterName($relative);
            }
        }

        return $missing;
    }

    /** URL-safe each segment so folder/file names with spaces still resolve. */
    protected function encodePath(string $relative): string
    {
        return implode('/', array_map('rawurlencode', explode('/', $relative)));
    }

    /** "branding/spring-campaign-01.jpg" -> "Spring Campaign 01" */
    protected function title(string $relative): string
    {
        $name = pathinfo($relative, PATHINFO_FILENAME);
        $name = preg_replace('/[_\-]+/', ' ', $name);
        $name = preg_replace('/\s+/', ' ', trim($name));

        return $name === '' ? 'Creative Artwork' : ucwords($name);
    }

    /** "Social Media" -> "social-media" */
    protected function slug(string $value): string
    {
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $value));

        return trim($slug, '-') ?: self::DEFAULT_CATEGORY;
    }

    /** "social-media" -> "Social Media" */
    protected function label(string $category): string
    {
        return ucwords(str_replace('-', ' ', $category));
    }
}
