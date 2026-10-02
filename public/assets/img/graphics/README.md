# Our Work gallery — drop media here

Everything in this folder renders on `/our-work`. Counts, filter buttons and
titles come from the files, so there is nothing to edit in code.

## Layout

Folder depth is what gives meaning:

```
graphics/poster.jpg                         -> one-off tile, filed under "Design"
graphics/Brand Identity/one-off.jpg         -> one-off tile, filed under "Brand Identity"
graphics/Brand Identity/RAWMAT Coffee/*.jpg -> ONE project card holding all its files
```

- **First level** becomes a filter button (`Brand Identity`).
- **Second level** becomes a project card. Its files do not appear as separate
  tiles — the card shows a cover, an asset count, and opens its own set in the
  lightbox.

Filenames become titles: `spring-campaign-02.jpg` -> "Spring Campaign 02".

## Project metadata (optional)

Drop a `project.json` inside a project folder to give the card a real name:

```json
{
  "title": "RAWMAT Coffee",
  "client": "RAWMAT",
  "year": "2026",
  "blurb": "Identity, packaging and store collateral for a Seoul coffee brand.",
  "cover": "packaging-hero.jpg"
}
```

Every field is optional. Without it the folder name is used. `cover` names which
file leads the card; otherwise the first image wins (an image is preferred over
a video). Malformed JSON is ignored rather than fatal.

Each project card gets a deep link: `/our-work#brand-identity-rawmat-coffee`
(the slug is `<first level>-<second level>`, lowercased and hyphenated).

## Video

Supported: `mp4`, `webm`, `mov`, `m4v`. Images: `jpg`, `jpeg`, `png`, `webp`,
`avif`, `gif`.

After adding video, generate thumbnails so the grid stays light — tiles use
`preload="none"` and only fetch video bytes on hover or click:

```
php artisan gallery:posters
```

This writes into `posters/`, which is generated output, not gallery content —
do not put your own media there. Needs `ffmpeg` on your machine (not in
production, since the posters are committed).
