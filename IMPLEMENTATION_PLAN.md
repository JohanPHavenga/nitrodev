# NitroDev — Implementation Plan (for Claude Code / Sonnet)

> **Goal:** Build the NitroDev one-page portfolio/marketing site as a Laravel app using
> Blade + Tailwind + Alpine, recreating the design in `design_handoff_nitrodev_site/` faithfully.
> **Target for this pass: get it building and running on `localhost`.** No deployment.

You are implementing a **static, single-page** marketing site. There is no database, no auth,
no forms that post to the server. The only interactivity is client-side (theme toggle, sticky-header
shadow, mobile menu, reveal-on-scroll). Keep it simple.

---

## 0. Source of truth — read these first

1. `design_handoff_nitrodev_site/README.md` — the full handoff: every section, copy, token, and
   interaction is specified there. **Treat its copy/content as verbatim.**
2. `design_handoff_nitrodev_site/design/NitroDev.html` — the hi-fi prototype. Open it in a browser.
   For **any exact value not in the README** (precise padding, transition timings, the `.bolt`
   clip-path, badge positions, etc.), read its `<style>` and `<script>` blocks directly. This file
   is the final word on look and behavior.
3. `design_handoff_nitrodev_site/design/assets/**` — the image assets to copy into the app.

Do **not** drop the prototype HTML in verbatim. Recreate it using Laravel/Blade conventions.

---

## 1. Stack decisions (already made — do not deviate)

- **Laravel** (latest stable, currently Laravel 12+) — fresh scaffold, no starter kit needed.
- **Blade** for templates + Blade components for the repeated cards.
- **Tailwind CSS v4** (Laravel's current default via Vite) for styling.
- **Alpine.js** for the small client-side interactions.
- **No Livewire.** This page has no dynamic server state, so Livewire adds nothing. (If a real
  contact form is wanted later, add Livewire then — out of scope now. The contact CTA is a
  `mailto:` link for now, exactly as the design specifies.)
- **No database / migrations / models.** Portfolio + services content lives in a PHP array
  (`config/site.php`) and is looped in Blade.

### ⚠️ Critical: Tailwind v4, not v3

The README mentions `tailwind.config.js`. That is **Tailwind v3 phrasing.** Laravel now ships
**Tailwind v4**, which has **no `tailwind.config.js`** — theme tokens are declared in CSS via
`@theme` inside `resources/css/app.css`, and the `@tailwindcss/vite` plugin is already wired in
`vite.config.js`. Implement tokens the v4 way (see §4). Do not create a `tailwind.config.js`.

---

## 2. Prerequisites & scaffold

```bash
# from the repo root (the folder containing design_handoff_nitrodev_site/)
composer create-project laravel/laravel app      # scaffold into ./app to keep design_handoff/ separate
# (or scaffold in place if you prefer — but keep design_handoff_nitrodev_site/ untouched)
cd app
npm install
npm install alpinejs
```

Confirm the fresh app boots before changing anything:

```bash
php artisan serve     # http://127.0.0.1:8000
npm run dev           # in a second terminal — Vite dev server / HMR
```

> Decide with the repo layout in mind: if Johan wants the Laravel app at the **repo root** rather
> than in `./app`, scaffold into a temp dir and move files up, preserving `design_handoff_nitrodev_site/`.
> Either is fine — just be consistent and don't clobber the handoff folder.

---

## 3. Content data (`config/site.php`)

Create `config/site.php` returning an array the views loop over. Pull all copy **verbatim** from the
README §"Screens / Views". Shape it like this:

```php
return [
    'contact' => [
        'email' => 'info@nitrodev.co.za',
        'phone_display' => '068 623 9340',
        'whatsapp' => 'https://wa.me/27686239340',
        'location' => 'Cape Town, South Africa',
    ],
    'services' => [
        ['icon' => 'code',     'title' => 'Web Development',      'blurb' => '...', 'bullets' => ['...','...','...']],
        ['icon' => 'database', 'title' => 'Hosting & Maintenance','blurb' => '...', 'bullets' => ['...','...','...']],
        ['icon' => 'monitor',  'title' => 'Design & Redesign',    'blurb' => '...', 'bullets' => ['...','...','...']],
    ],
    'work' => [
        ['variant'=>'browser','category'=>'Property · Custom CMS','title'=>'Harmonie Rental Properties','blurb'=>'...','tags'=>['Web development','CMS','Hosting'],'url'=>'https://harmonieprop.co.za','image'=>'harmonie.jpg'],
        ['variant'=>'browser','category'=>'Directory · Web app','title'=>'Running Calendar','blurb'=>'...','tags'=>['Web app','Search','Hosting'],'url'=>'https://runningcalendar.co.za','image'=>'runningcalendar.jpg'],
        ['variant'=>'browser','category'=>'Education · Web design','title'=>'Uitsig Kleuterskool','blurb'=>'...','tags'=>['Redesign','One-page','Mobile-first'],'url'=>'https://uitsigkleuterskool.co.za','image'=>'uitsig.jpg'],
        ['variant'=>'phone','category'=>'Garage Doors · Mobile-first','title'=>'TightFit','blurb'=>'...','tags'=>['Mobile-first','Web design','Hosting'],'url'=>'https://tightfit.co.za','image'=>'tightfit-mobile.png'],
    ],
    'process' => [
        ['no'=>'01','title'=>'Chat & plan','blurb'=>'...'],
        ['no'=>'02','title'=>'Design','blurb'=>'...'],
        ['no'=>'03','title'=>'Build & launch','blurb'=>'...'],
        ['no'=>'04','title'=>'Host & support','blurb'=>'...'],
    ],
];
```

Fill every `'...'` from the README. The single route returns the home view with this config.

```php
// routes/web.php
Route::get('/', fn () => view('home'))->name('home');
// In the view, read config('site.services'), config('site.work'), etc.
```

---

## 4. Styling: tokens, theming, dark mode (the part to get right)

The prototype themes by swapping **CSS custom properties** under `[data-theme="dark"]`. Keep that
mechanism and bridge it into Tailwind v4 so utilities respond to the theme automatically.

In `resources/css/app.css`:

```css
@import "tailwindcss";

/* 1. Tell Tailwind that dark styles trigger on the data-theme attribute, not the default class. */
@custom-variant dark (&:where([data-theme="dark"], [data-theme="dark"] *));

/* 2. Port the prototype's token block VERBATIM (copy from NitroDev.html <style>). */
:root{
  --navy:#0d2e49; --navy-700:#0a2438; --navy-900:#061a2c;
  --ink:#0d2e49; --slate:#4d5b69; --muted:#8694a2;
  --bg:#ffffff; --surface:#f4f7fa; --surface-2:#eaf1f6;
  --line:#e3eaf1; --line-strong:#d3deea;
  --accent:#13b6e6; --accent-700:#0c91bb; --accent-soft:#e6f7fc;
  --card:#ffffff; --card-bar:#fbfdff; --header-bg:rgba(255,255,255,.82);
  --link:var(--navy);
  --shadow-sm:0 1px 2px rgba(13,46,73,.05),0 4px 14px -8px rgba(13,46,73,.12);
  --shadow:0 18px 50px -28px rgba(13,46,73,.45);
}
[data-theme="dark"]{
  --ink:#e9f1f8; --slate:#aebfce; --muted:#7d92a5;
  --bg:#0b1826; --surface:#0f2132; --surface-2:#15293c;
  --line:#21384c; --line-strong:#2d465c;
  --accent-700:#3cc6ef; --accent-soft:rgba(19,182,230,.16);
  --card:#13263a; --card-bar:#0f2132; --header-bg:rgba(11,24,38,.85);
  --link:#3cc6ef; --navy:#16395a; --navy-700:#10324f; --navy-900:#0a1a2b;
  --shadow:0 18px 50px -26px rgba(0,0,0,.6);
  /* --accent stays #13b6e6 in both themes */
}

/* 3. Expose tokens to Tailwind utilities (so `bg-navy`, `text-slate`, `border-line` work
      AND follow the theme because they reference the live CSS variables). */
@theme inline {
  --color-navy: var(--navy);
  --color-navy-700: var(--navy-700);
  --color-navy-900: var(--navy-900);
  --color-ink: var(--ink);
  --color-slate: var(--slate);
  --color-muted: var(--muted);
  --color-bg: var(--bg);
  --color-surface: var(--surface);
  --color-surface-2: var(--surface-2);
  --color-line: var(--line);
  --color-line-strong: var(--line-strong);
  --color-accent: var(--accent);
  --color-accent-700: var(--accent-700);
  --color-accent-soft: var(--accent-soft);
  --color-card: var(--card);
  --color-card-bar: var(--card-bar);
  --color-link: var(--link);

  --font-display: "Space Grotesk", system-ui, sans-serif;
  --font-sans: "Manrope", system-ui, sans-serif;

  --radius-card: 16px;
  --radius-card-lg: 20px;
  --shadow-card: var(--shadow);
}

body{ font-family: var(--font-sans); background: var(--bg); color: var(--ink);
  line-height:1.6; transition: background .3s ease, color .3s ease; }
html{ scroll-behavior:smooth; }
```

Guidance:

- Prefer Tailwind utilities (`bg-surface`, `text-slate`, `border-line`, `font-display`,
  `rounded-card`, `shadow-card`, fluid text via arbitrary values like `text-[clamp(40px,5.2vw,68px)]`).
- For a handful of bespoke bits (the `.bolt` clip-path glyph, the dotted radial-grid backgrounds,
  the work-card hover image-pan, the phone-shell notch), it's fine to write small component CSS
  classes in `app.css` — copy the exact rules from the prototype. Don't fight Tailwind for these.
- `scroll-margin-top: 90px` on the anchored sections (`scroll-mt-[90px]`).
- Honour `@media (prefers-reduced-motion: reduce)` — reveal elements show by default, no transforms.

### Fonts
Simplest: keep the Google Fonts `<link>` (Space Grotesk + Manrope) in the layout `<head>`, exactly
as the prototype. Self-hosting via `@font-face` is a nice-to-have, **not** required for this pass.

### Anti-FOUC theme script (must run before paint)
In `<head>`, **before** the Vite CSS, inline:

```html
<script>
  (function () {
    var t = localStorage.getItem('nitrodev-theme');
    if (t === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
  })();
</script>
```

This prevents a light flash on load for dark-mode users.

---

## 5. Assets

Copy the images into the app's public path and reference with `asset()`:

```bash
mkdir -p public/images/nitrodev/brand
cp ../design_handoff_nitrodev_site/design/assets/*.jpg                public/images/nitrodev/
cp ../design_handoff_nitrodev_site/design/assets/*.png                public/images/nitrodev/
cp ../design_handoff_nitrodev_site/design/assets/brand/*.png          public/images/nitrodev/brand/
```

(Adjust the relative path to wherever the handoff folder sits relative to the app.) Ignore any
`*Zone.Identifier` files — those are Windows metadata, do not copy them.

Files: `brand/nitrodev-navy.png`, `brand/nitrodev-white.png`, `harmonie.jpg`,
`runningcalendar.jpg`, `uitsig.jpg`, `tightfit-mobile.png`.

Logo swaps by theme (navy logo in light, white logo in dark) — do this with two `<img>` tags toggled
by a `dark:` utility (e.g. light logo `dark:hidden`, dark logo `hidden dark:block`), height 30px in
the header, 42px white logo in the footer.

Icons are inline **Lucide-style SVGs** (2px stroke) — paste them inline in the Blade markup, exactly
as in the prototype. No emoji anywhere.

---

## 6. Blade structure

```
resources/views/
  layouts/app.blade.php        ← <html data-theme> wrapper; <head> (fonts, anti-FOUC script, @vite);
                                  Alpine root for theme/menu state; header + footer + {{ $slot }} or @yield
  partials/header.blade.php     ← sticky nav, theme toggle, hamburger, mobile dropdown
  partials/footer.blade.php     ← brand block + link columns + bottom bar
  home.blade.php                ← hero · client strip · services · work · process · contact
resources/views/components/
  service-card.blade.php        ← <x-service-card :icon :title :blurb :bullets>
  work-card.blade.php           ← browser-frame variant <x-work-card :item>
  work-card-phone.blade.php     ← phone-frame variant <x-work-card-phone :item>
```

Loop `config('site.services')` into `<x-service-card>`, and `config('site.work')` into the right
work-card component based on `item['variant']`. Loop `config('site.process')` for the 4 steps.

Build all **8 sections** per README §"Screens / Views", in order:
1. Sticky header  2. Hero (`#top`)  3. Client strip  4. Services (`#services`)
5. Work (`#work`)  6. Process (`#process`)  7. Contact CTA (`#contact`)  8. Footer.

Layout rules: max content width **1200px**, side padding **32px** (20px ≤560px), centered.
Breakpoints: **980px** (tablet → stack), **560px** (mobile tightening). Map these to Tailwind
arbitrary breakpoints or the nearest defaults; the prototype's exact `@media` widths are the target.

---

## 7. Interactions (Alpine.js)

Register Alpine in `resources/js/app.js`:

```js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
```

Implement each behavior (all detailed in README §"Interactions & Behavior"):

- **Theme toggle** — clicking the header button flips `data-theme="dark"` on `<html>` and persists
  to `localStorage['nitrodev-theme']` (`"dark"`/`"light"`). Moon icon in light, sun icon in dark.
  Use an Alpine store or `x-data` on the `<html>`/body root. (Initial value already applied by the
  anti-FOUC script — keep the two in sync.)
- **Sticky-header shadow** — add `.scrolled` (border + shadow) when `window.scrollY > 8`.
  `@scroll.window` in Alpine.
- **Mobile menu** — hamburger toggles `open` on the nav (≤980px); clicking any link closes it.
- **Reveal-on-scroll** — `.reveal` elements start `opacity:0; translateY(22px)`, animate in via
  `IntersectionObserver` (threshold .14), staggered ~60ms within a row. **Disabled / shown by
  default under `prefers-reduced-motion: reduce`.** This can be a small vanilla IO snippet in
  `app.js` or an Alpine directive — either is fine.
- **Hover states** — buttons lift 1px + shadow; cards lift 4–5px + stronger border + shadow; work
  screenshots pan `object-position: top → bottom` over ~2.6s; "Visit live site ↗" arrow nudges
  (+3,−3px). Pure CSS/Tailwind hover utilities.
- **Smooth scrolling** — `html{scroll-behavior:smooth}` + `scroll-margin-top:90px` on sections.

Links open external sites in a new tab: `target="_blank" rel="noopener"`.

---

## 8. Accessibility & semantics

- Semantic landmarks: `<header> <main> <section> <footer>`, one `<h1>` (the hero), logical heading order.
- Icon-only buttons (theme toggle, hamburger) need `aria-label` and `aria-expanded` (hamburger).
- Decorative SVGs / grid textures: `aria-hidden="true"`.
- Visible focus states on all interactive elements; nav must be keyboard-operable.
- Respect `prefers-reduced-motion`.
- All `<img>` have meaningful `alt` (logo, each screenshot).

---

## 9. Run & verify locally (acceptance checklist)

```bash
php artisan serve & npm run dev
```

Open `http://127.0.0.1:8000` and confirm:

- [ ] All 8 sections render top-to-bottom with the correct copy (matches README verbatim).
- [ ] Light theme matches the prototype; toggling switches to dark and **persists across reloads**;
      no light flash on load in dark mode.
- [ ] Correct logo shows per theme (navy/light, white/dark) in header and footer.
- [ ] Header gains shadow/border after scrolling >8px; nav anchors smooth-scroll and clear the header.
- [ ] Responsive: at ≤980px columns stack and the hamburger menu works; ≤560px tightens correctly.
- [ ] Service cards (3), work cards (3 browser + 1 phone), and process steps (4) all render from
      `config/site.php`; the TightFit card uses the phone-frame variant.
- [ ] Hover lifts, screenshot pan, and arrow nudge work.
- [ ] Reveal-on-scroll animates; with reduced-motion enabled, everything is visible with no motion.
- [ ] "Get a free quote" → `mailto:info@nitrodev.co.za`; "WhatsApp us" → `https://wa.me/27686239340`;
      work links open in new tabs.
- [ ] `npm run build` completes with no errors; no console errors in the browser.
- [ ] Run `./vendor/bin/pint` to format PHP.

> Pixel-check against `design/NitroDev.html` open side-by-side in the browser, in **both** themes
> and at desktop + mobile widths. The prototype is the reference for anything ambiguous.

---

## 10. Out of scope (do not build now)

- Deployment / hosting / domain setup.
- A working contact form, mail sending, Livewire, database, or auth.
- CMS / admin. Content stays in `config/site.php`.

---

## Suggested commit order

1. Fresh Laravel scaffold + Alpine install (boots clean).
2. `config/site.php` with all content; `/` route + empty `home` view.
3. `app.css` tokens/theme + anti-FOUC script + fonts + assets copied.
4. Layout + header + footer (theme toggle, scrolled, mobile menu working).
5. Hero + client strip.
6. Services (+ `service-card` component).
7. Work (+ `work-card` and `work-card-phone` components).
8. Process + Contact CTA.
9. Reveal-on-scroll + reduced-motion + a11y pass.
10. Final pixel pass against prototype in both themes; `pint` + `npm run build`.
