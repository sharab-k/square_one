<?php

namespace App\Support;

class GraphicsGallery
{
    /**
     * Folder (relative to public/) that holds the gallery media.
     *
     * Layout is up to two levels deep, and the depth is what gives meaning:
     *
     *   graphics/loose.jpg                        -> a one-off tile
     *   graphics/<Discipline>/loose.jpg           -> a one-off tile, filed under a discipline
     *   graphics/<Discipline>/<Project>/a.jpg     -> part of a project card
     *
     * The first level becomes the filter button, the second becomes a project
     * card that opens its own set in the lightbox. Drop a `project.json` beside
     * the files to give the card a real title, client and blurb.
     */
    public const DIR = 'assets/img/graphics';

    /** Where `php artisan gallery:posters` writes video thumbnails (relative to DIR). */
    public const POSTER_DIR = 'posters';

    /** Optional metadata file inside a project folder. */
    public const PROJECT_FILE = 'project.json';

    protected const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp', 'avif', 'gif'];

    protected const VIDEO_EXTENSIONS = ['mp4', 'webm', 'mov', 'm4v'];

    /** Fallback category for files dropped in the folder root. */
    protected const DEFAULT_CATEGORY = 'design';

    /** @var list<array<string, mixed>>|null */
    protected ?array $cachedItems = null;

    /**
     * Every image and video in the gallery folder, flat.
     *
     * @return list<array{src: string, type: string, poster: ?string, title: string, category: string, label: string, project: ?string}>
     */
    public function items(): array
    {
        if ($this->cachedItems !== null) {
            return $this->cachedItems;
        }

        $root = public_path(self::DIR);

        if (! is_dir($root)) {
            return $this->cachedItems = [];
        }

        $items = [];

        foreach ($this->files($root) as $path) {
            $relative = str_replace(DIRECTORY_SEPARATOR, '/', substr($path, strlen($root) + 1));
            $segments = explode('/', $relative);
            array_pop($segments);

            $category = isset($segments[0]) ? $this->slug($segments[0]) : self::DEFAULT_CATEGORY;
            $project = isset($segments[1]) ? $this->slug($segments[0] . '-' . $segments[1]) : null;
            $isVideo = $this->isVideo($relative);

            // A video's box is described by its poster, since that is what the
            // browser lays out before any video bytes are fetched.
            $measure = $isVideo
                ? public_path(self::DIR . '/' . self::POSTER_DIR . '/' . $this->posterName($relative))
                : $path;

            $items[] = [
                'src' => asset(self::DIR . '/' . $this->encodePath($relative)),
                'type' => $isVideo ? 'video' : 'image',
                'poster' => $isVideo ? $this->poster($relative) : null,
                'dimensions' => $this->dimensions($measure),
                'title' => $this->title($relative),
                'category' => $category,
                'label' => $this->label(isset($segments[0]) ? $segments[0] : self::DEFAULT_CATEGORY),
                'project' => $project,
                'projectName' => $segments[1] ?? null,
                'projectPath' => isset($segments[1]) ? $segments[0] . '/' . $segments[1] : null,
            ];
        }

        return $this->cachedItems = $items;
    }

    /**
     * What the grid actually renders: project cards and one-off tiles, in one
     * list so the Blade loop and the filter stay simple.
     *
     * A project tile carries its whole media set; a single tile carries itself.
     *
     * @return list<array<string, mixed>>
     */
    public function tiles(): array
    {
        // Walk once, keeping the order files appear in. A project takes the
        // position of its first file, so the grid order stays predictable.
        $order = [];
        $projects = [];

        foreach ($this->items() as $item) {
            if ($item['project'] === null) {
                $order[] = ['single', $item];

                continue;
            }

            if (! isset($projects[$item['project']])) {
                $projects[$item['project']] = ['meta' => $this->projectMeta($item['projectPath']), 'items' => []];
                $order[] = ['project', $item['project']];
            }

            $projects[$item['project']]['items'][] = $item;
        }

        $tiles = [];

        foreach ($order as [$kind, $value]) {
            if ($kind === 'single') {
                $tiles[] = [
                    'kind' => 'single',
                    'slug' => null,
                    'category' => $value['category'],
                    'label' => $value['label'],
                    'title' => $value['title'],
                    'client' => null,
                    'year' => null,
                    'blurb' => null,
                    'cover' => $value,
                    'media' => [$value],
                    'count' => 1,
                ];

                continue;
            }

            $project = $projects[$value];
            $meta = $project['meta'];
            $first = $project['items'][0];
            $cover = $this->cover($project['items'], $meta['cover'] ?? null);

            // Open on the cover: clicking a card should show the picture that
            // was on it, not whatever happens to sort first.
            $media = array_values(array_merge(
                [$cover],
                array_filter($project['items'], fn ($item) => $item !== $cover),
            ));

            $tiles[] = [
                'kind' => 'project',
                'slug' => $value,
                'category' => $first['category'],
                'label' => $first['label'],
                'title' => $meta['title'] ?? $this->label($first['projectName']),
                'client' => $meta['client'] ?? null,
                'year' => $meta['year'] ?? null,
                'blurb' => $meta['blurb'] ?? null,
                'cover' => $cover,
                'media' => $media,
                'count' => count($media),
            ];
        }

        return $tiles;
    }

    /**
     * Categories actually present, counted in tiles rather than files — a
     * six-asset project is one thing in the grid, so it counts as one.
     *
     * @return list<array{category: string, label: string, count: int}>
     */
    public function categories(): array
    {
        $counts = [];

        foreach ($this->tiles() as $tile) {
            $counts[$tile['category']] ??= ['category' => $tile['category'], 'label' => $tile['label'], 'count' => 0];
            $counts[$tile['category']]['count']++;
        }

        ksort($counts);

        return array_values($counts);
    }

    /**
     * The image that leads a project card: whichever file project.json names,
     * otherwise the first one. Prefer a still — a video poster is a weaker
     * cover and may not exist yet.
     *
     * @param  list<array<string, mixed>>  $items
     * @return array<string, mixed>
     */
    protected function cover(array $items, ?string $named): array
    {
        if ($named !== null) {
            foreach ($items as $item) {
                if (rawurldecode(basename((string) parse_url($item['src'], PHP_URL_PATH))) === $named) {
                    return $item;
                }
            }
        }

        foreach ($items as $item) {
            if ($item['type'] === 'image') {
                return $item;
            }
        }

        return $items[0];
    }

    /**
     * Optional per-project metadata. Malformed JSON is ignored rather than
     * fatal — a typo in one file should not take the page down.
     *
     * @return array<string, mixed>
     */
    protected function projectMeta(string $projectPath): array
    {
        $file = public_path(self::DIR . '/' . $projectPath . '/' . self::PROJECT_FILE);

        if (! is_file($file)) {
            return [];
        }

        $decoded = json_decode((string) file_get_contents($file), true);

        return is_array($decoded) ? $decoded : [];
    }

    /**
     * Intrinsic size, so the markup can declare width/height. Reading headers
     * off ~50 files costs around 12ms, which is cheap enough to do per request
     * and keeps "drop a file in and it appears" true with no cache to warm.
     *
     * @return array{0: int, 1: int}|null
     */
    protected function dimensions(string $path): ?array
    {
        if (! is_file($path)) {
            return null;
        }

        $size = @getimagesize($path);

        return $size === false ? null : [(int) $size[0], (int) $size[1]];
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
        $dir = pathinfo($relative, PATHINFO_DIRNAME);
        $name = pathinfo($relative, PATHINFO_FILENAME);

        return str_replace('/', '__', $dir === '.' ? $name : $dir . '/' . $name) . '.jpg';
    }

    /**
     * All media under $root, down to two folders deep.
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
            glob($root . '/*/*' . $pattern, GLOB_BRACE) ?: [],
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
    protected function label(string $value): string
    {
        return ucwords(str_replace('-', ' ', $value));
    }
}
