# Handoff: NitroDev Marketing / Portfolio Site

## Overview
A single-page marketing + portfolio website for **NitroDev** — a freelance web-development &
hosting business based in Cape Town, South Africa. It pitches three services (development, hosting,
design), shows four portfolio pieces, explains the process, and drives the visitor to a contact CTA.
It ships with a **light + dark theme** (persisted) and is fully responsive.

## About the Design Files
The file in `design/NitroDev.html` is a **design reference created in HTML** — a high-fidelity
prototype showing the intended look, layout, copy and behavior. **It is not meant to be dropped into
the Laravel app verbatim.** The task is to **recreate this design inside the target Laravel
application using its established conventions** — i.e. Blade templates (and Blade components for the
repeated cards), with styling via whatever the project already uses. If the project has **Tailwind**
(the Laravel default via Vite), translate the tokens below into `tailwind.config.js` and utility
classes. If it uses plain CSS/Sass, port the CSS variables block as-is. Keep the markup semantic and
accessible.

The prototype is **self-contained**: all CSS is in a single `<style>` block in the `<head>` and all
JS is a single `<script>` at the end of `<body>`. There is no build step or framework — only two
Google Fonts and a handful of local image assets.

## Fidelity
**High-fidelity (hifi).** Final colors, typography, spacing, radii, shadows and interactions are all
defined. Recreate the UI pixel-faithfully using the codebase's patterns. Exact values are in
**Design Tokens** below.

---

## Suggested Laravel structure
This is a guide, not a mandate — follow the project's existing conventions first.

```
resources/views/
  layouts/app.blade.php          ← <html>, <head> (fonts + CSS/Vite), header, footer, @yield('content')
  partials/header.blade.php      ← sticky nav + theme toggle + mobile menu
  partials/footer.blade.php      ← footer + legal line
  home.blade.php                 ← hero, client strip, services, work, process, contact
components/
  service-card.blade.php         ← <x-service-card> (icon, title, blurb, bullets[])
  work-card.blade.php            ← <x-work-card> (browser-frame variant)
  work-card-phone.blade.php      ← phone-frame variant (TightFit)
resources/css/app.css            ← :root tokens + component CSS (or port to Tailwind)
resources/js/app.js              ← theme toggle, scroll header, mobile menu, reveal-on-scroll
public/images/nitrodev/          ← logos + portfolio screenshots (from design/assets/)
```
The four portfolio entries and three services are ideal as a small data array (a config file,
`config/site.php`, or just an array passed from the controller) looped in Blade — content is listed
verbatim under **Screens / Views**.

---

## Screens / Views
One page, top to bottom. Max content width **1200px**, side padding **32px** (20px on ≤560px),
centered.

### 1. Header (sticky)
- **Layout:** Full-width sticky bar, height **74px**. Flex row, `space-between`:
  `[ logo ] [ nav links ] [ actions ]`.
- **Background:** translucent `rgba(255,255,255,.82)` light / `rgba(11,24,38,.85)` dark, with
  `backdrop-filter: saturate(140%) blur(12px)`. Bottom border + soft shadow appear only after the
  page is scrolled >8px (toggle a `.scrolled` class).
- **Logo:** swaps by theme — navy logo (`nitrodev-navy.png`) in light, white logo
  (`nitrodev-white.png`) in dark. Height **30px**.
- **Nav links:** `Services · Work · Process · Contact`, 14.5px / 600, color `--slate`, hover `--ink`.
  Smooth-scroll to in-page anchors (`#services`, `#work`, `#process`, `#contact`).
- **Actions:** a **theme toggle** button (42×42, 11px radius, 1.5px border `--line-strong`) showing a
  moon icon in light mode and a sun icon in dark mode; and a **hamburger** button (same style, 44×44)
  shown only ≤980px.
- **Mobile (≤980px):** nav links hide; hamburger reveals them as a dropdown panel (`--card` bg,
  bottom border, column layout) below the bar.

### 2. Hero (`#top`)
- **Layout:** Two columns `1.05fr .95fr`, gap **56px**, vertically centered. Padding top 74px,
  bottom 88px. Collapses to one column ≤980px (copy first, visual second).
- **Left (copy):**
  - Eyebrow (with a small lightning-bolt glyph): `FREELANCE WEB DEVELOPMENT & HOSTING` — 12px / 700,
    uppercase, letter-spacing .18em, color `--accent-700`.
  - H1: “Fast, reliable websites — **built & hosted**, end to end.” — `clamp(40px,5.2vw,68px)`, 700,
    line-height 1.05, tracking -.02em. The phrase “built & hosted” is colored `--accent-700`.
  - Lead paragraph (19px, `--slate`, max-width 30em): “NitroDev designs, develops and hosts modern
    websites for South African businesses. One partner from first sketch to live site — and we keep
    it running.”
  - Two buttons: **“Get a free quote”** (accent, links to `#contact`) and **“View recent work”**
    (ghost, links to `#work`).
  - Trust row (gap 28px): `25+ Sites launched` · `99.9% Hosting uptime` · `15 yrs Building for the
    web`. Number = 30px display font; label = 13px `--muted`.
- **Right (visual):** a floating **browser-frame card** (`hero-card`) showing
  `design/assets/harmonie.jpg` under a fake browser bar (`harmonieprop.co.za`), plus two small
  floating badge chips: “100 / 100 — PageSpeed score” (top-right) and “Always online — Managed
  hosting & backups” (bottom-left). Subtle dotted radial-grid background behind it. *(These badges
  are decorative; safe to simplify if needed.)*

### 3. Client strip
- Full-width band, `--surface` bg, hairline top+bottom border.
- Left label `TRUSTED TO BUILD & HOST` (12.5px, uppercase, `--muted`); names row:
  `Harmonie · RunningCalendar · Uitsig Kleuterskool · TightFit` (18px display, `--ink`, opacity .55).

### 4. Services (`#services`)
- Section header: eyebrow `WHAT WE DO`, H2 “Everything your site needs, under one roof.”, sub
  paragraph “Design, build and hosting handled by one developer who answers the phone. No agencies,
  no hand-offs, no surprises.”
- **3-column grid** (gap 24px → 1 column ≤980px, max 480px centered) of **service cards**. Each card:
  `--card` bg, 1px `--line` border, 16px radius, 32×30 padding. Hover: lift `translateY(-4px)` +
  `--shadow` + border `--line-strong`. Contents: a 52×52 navy icon tile (13px radius, white Lucide
  icon), H3 (21px), blurb (15px `--slate`), and a bullet list (dots colored `--accent`).
  1. **Web Development** — “Custom, hand-coded websites that are fast, responsive and easy to manage —
     built to fit your business, not a template.” Bullets: *Business & brochure sites · Custom CMS so
     you can self-update · Web apps & directories.* Icon: code `</>`.
  2. **Hosting & Maintenance** — “Reliable South African-friendly hosting with SSL, daily backups and
     monitoring — so your site stays fast and online.” Bullets: *Managed hosting & domains · SSL,
     backups & uptime monitoring · Updates, fixes & support.* Icon: database/cylinder.
  3. **Design & Redesign** — “Clean, modern, mobile-first design — or a fresh redesign that turns a
     dated site into one that earns trust.” Bullets: *Mobile-first responsive design · Brand-aligned
     UI & layout · Performance & SEO basics.* Icon: monitor.

### 5. Work (`#work`)
- Section sits on `--surface` band. Header: eyebrow `SELECTED WORK`, H2 “Live sites, built & hosted
  by NitroDev.”, sub “A few recent projects — each designed, developed and kept online by us.”
- **2-column grid** (gap 28px → 1 column ≤980px, max 520px centered) of **work cards**. Card:
  `--card` bg, 1px `--line` border, 20px radius, column flex, hover lift `translateY(-5px)` +
  `--shadow`. Two variants:
  - **Browser variant** (3 cards): top “frame” area (height 288px, `--surface-2` bg, 22px top/side
    padding) holds a mini-browser (fake traffic-light dots + URL bar) with the screenshot
    (`object-fit: cover; object-position: top`). On hover the screenshot slowly pans to
    `object-position: bottom` (2.6s ease). Body: category eyebrow (`--accent-700`), H3 (23px),
    blurb (14.5px), tag pills, and a “Visit live site ↗” link (color `--link`; arrow nudges on hover).
  - **Phone variant** (TightFit): the frame area has a dark gradient bg
    (`linear-gradient(160deg,#13324f,#0a2438)`) and centers a **phone shell** (188×264, bg `#0b1c2c`,
    30px top radius, 1px translucent border, drop shadow, a speaker-notch pill near the top) holding
    the screenshot `tightfit-mobile.png` (`object-fit: cover; object-position: top`, 22px top radius).
- **Card content (verbatim):**
  | Card | Category | Title | Blurb | Tags | URL |
  |---|---|---|---|---|---|
  | 1 | `Property · Custom CMS` | Harmonie Rental Properties | “A holiday-rental site for Hermanus with a custom backend CMS so the owner can add and update listings themselves.” | Web development, CMS, Hosting | https://harmonieprop.co.za |
  | 2 | `Directory · Web app` | Running Calendar | “A verified directory of every road race in Southern Africa — searchable, filterable and updated weekly across nine provinces.” | Web app, Search, Hosting | https://runningcalendar.co.za |
  | 3 | `Education · Web design` | Uitsig Kleuterskool | “A dated pre-school site rebuilt into a modern, mobile-friendly one-page design with smooth in-page navigation.” | Redesign, One-page, Mobile-first | https://uitsigkleuterskool.co.za |
  | 4 (phone) | `Garage Doors · Mobile-first` | TightFit | “A mobile-first site for a Hermanus garage-door & automation specialist — built to look and load great in the hand, where most of their visitors land.” | Mobile-first, Web design, Hosting | https://tightfit.co.za |

  Screenshots map to: Harmonie→`harmonie.jpg`, Running Calendar→`runningcalendar.jpg`,
  Uitsig→`uitsig.jpg`, TightFit→`tightfit-mobile.png`. All links open in a new tab
  (`target="_blank" rel="noopener"`).

### 6. Process (`#process`)
- Header: eyebrow `HOW IT WORKS`, H2 “A simple, no-jargon process.”, sub “From first conversation to a
  live, looked-after website — here's how we get there.”
- **4-column grid** (gap 22px → 2 col ≤980px → 1 col ≤560px). Each step: a 34×3 accent bar on top, a
  number (`01`–`04`, accent), H3 (19px), and a short blurb:
  1. **Chat & plan** — “We talk through your goals, pages and budget, then agree a clear scope and quote.”
  2. **Design** — “A clean, mobile-first design mapped to your brand — reviewed before a line of code.”
  3. **Build & launch** — “Hand-coded, tested and deployed to fast managed hosting with SSL and backups.”
  4. **Host & support** — “We keep it online, updated and monitored — one number to call when you need a change.”

### 7. Contact / CTA (`#contact`)
- Full-bleed **navy** band (`--navy`), white text, faint dotted-grid texture top-right. Two columns
  `1.1fr .9fr`, gap 60px, padding 88px (→ 1 column ≤980px).
- **Left:** eyebrow `LET'S BUILD IT` (accent), H2 “Need a website that's fast, modern and looked
  after?”, paragraph “Tell us a little about your project and we'll come back with a clear plan and a
  fair quote — usually within a day.”, two buttons: **“Get a free quote”** (accent,
  `mailto:info@nitrodev.co.za`) and **“WhatsApp us”** (ghost on dark, `https://wa.me/27686239340`).
- **Right — contact card:** translucent white panel (`rgba(255,255,255,.06)`, 1px translucent border,
  20px radius). Three rows, each an accent-tinted icon tile + label/value:
  - **Email** — `info@nitrodev.co.za`
  - **Phone & WhatsApp** — `068 623 9340`
  - **Based in** — `Cape Town, South Africa`

### 8. Footer
- **Deep navy** (`--navy-900`), muted text. Top area is flex `space-between`: a brand block on the
  left and three link columns on the right.
- **Brand block:** white logo (height **42px**) sitting in a flex row beside the tagline, separated by
  a thin vertical rule (`border-left: 1px solid rgba(255,255,255,.16)`, 18px gap/padding). Tagline:
  “Freelance web development & hosting. Built fast, kept online.”
- **Link columns:** *Services* (Web Development / Hosting & Maintenance / Design & Redesign),
  *Company* (Work / Process / Contact), *Get in touch* (`info@nitrodev.co.za` / WhatsApp).
- **Bottom bar** (top hairline border): left = two stacked lines “© 2026 NitroDev. All rights
  reserved.” + `NitroDev (Pty) Ltd` (smaller, dimmer); right = “People-powered web, built in Cape
  Town.”

---

## Interactions & Behavior
- **Theme toggle:** clicking the header toggle flips `data-theme="dark"` on `<html>`. Persist the
  choice in `localStorage` under key `nitrodev-theme` (`"dark"`/`"light"`); read & apply it on load
  *before paint* to avoid a flash. Moon icon shows in light mode, sun icon in dark. Body transitions
  background/color over .3s. **In Laravel:** keep this as a tiny JS snippet (Alpine.js is a clean fit
  if the project uses it).
- **Sticky header shadow:** add `.scrolled` to the header when `window.scrollY > 8`.
- **Mobile menu:** hamburger toggles an `.open` class on the nav; clicking any link closes it.
- **Reveal-on-scroll:** elements with class `reveal` start at `opacity:0; translateY(22px)` and
  animate to visible via an `IntersectionObserver` (threshold .14), staggered by ~60ms within rows.
  **Must be disabled / shown-by-default** under `@media (prefers-reduced-motion: reduce)`.
- **Hover states:** buttons lift 1px + gain shadow; cards lift 4–5px + stronger border + shadow; work
  screenshots pan; “Visit live site” arrow nudges up-right (+3,−3px).
- **Smooth scrolling:** `html { scroll-behavior: smooth }`; sections have `scroll-margin-top: 90px`
  so anchors clear the sticky header.

## State Management
Minimal — this is a static marketing page.
- `theme` — `"light" | "dark"`, stored in `localStorage` (`nitrodev-theme`).
- `headerScrolled` — boolean derived from scroll position.
- `mobileMenuOpen` — boolean.
- The “Get a free quote” CTA is a `mailto:`; there is no form. If a contact **form** is wanted later,
  wire it to a Laravel route/controller + Mailable — not in scope of this design.

## Design Tokens
CSS custom properties from the prototype (copy verbatim, or map into `tailwind.config.js`).

**Light (`:root`)**
| Token | Value | Role |
|---|---|---|
| `--navy` | `#0d2e49` | brand navy; buttons, CTA bg, icon tiles |
| `--navy-700` | `#0a2438` | button hover |
| `--navy-900` | `#061a2c` | footer bg |
| `--ink` | `#0d2e49` | primary text / headings |
| `--slate` | `#4d5b69` | body text |
| `--muted` | `#8694a2` | labels / captions |
| `--bg` | `#ffffff` | page bg |
| `--surface` | `#f4f7fa` | tinted band bg |
| `--surface-2` | `#eaf1f6` | card frame bg / pills |
| `--line` | `#e3eaf1` | hairline borders |
| `--line-strong` | `#d3deea` | stronger borders |
| `--accent` | `#13b6e6` | cyan accent (CTAs, bullets, bolt) |
| `--accent-700` | `#0c91bb` | accent text / hover |
| `--accent-soft` | `#e6f7fc` | accent tint (badge tiles) |
| `--card` | `#ffffff` | card surface |
| `--card-bar` | `#fbfdff` | mini-browser bar |
| `--header-bg` | `rgba(255,255,255,.82)` | header bg |
| `--link` | `var(--navy)` | “visit” link color |

**Dark (`[data-theme="dark"]` overrides)**
`--ink #e9f1f8` · `--slate #aebfce` · `--muted #7d92a5` · `--bg #0b1826` · `--surface #0f2132` ·
`--surface-2 #15293c` · `--line #21384c` · `--line-strong #2d465c` · `--accent-700 #3cc6ef` ·
`--accent-soft rgba(19,182,230,.16)` · `--card #13263a` · `--card-bar #0f2132` ·
`--header-bg rgba(11,24,38,.85)` · `--link #3cc6ef` · `--navy #16395a` · `--navy-700 #10324f` ·
`--navy-900 #0a1a2b`. (Accent `#13b6e6` is unchanged across themes.)

**Typography**
- Display / headings: **Space Grotesk** (400–700). Headings 700, line-height 1.05, letter-spacing -.02em.
- Body / UI: **Manrope** (400–800). Body line-height 1.6.
- Loaded via Google Fonts; self-host in Laravel if you prefer (`@font-face` in `app.css`).
- Eyebrows: 12px, 700, uppercase, letter-spacing .18em.
- Scale used: H1 `clamp(40px,5.2vw,68px)`, H2 `clamp(30px,3.6vw,44px)`, card H3 21–23px, body 14.5–19px.

**Radii:** chips/pills 999px · cards 16–20px · icon tiles 11–13px · phone shell 30px top.
**Spacing:** band vertical padding 96px (64px ≤560px); wrap side padding 32px (20px ≤560px); grid gaps 22–28px.
**Shadows:** `--shadow: 0 18px 50px -28px rgba(13,46,73,.45)` (light) / `0 18px 50px -26px rgba(0,0,0,.6)` (dark);
`--shadow-sm: 0 1px 2px rgba(13,46,73,.05), 0 4px 14px -8px rgba(13,46,73,.12)`.
**Breakpoints:** `980px` (tablet → stack), `560px` (mobile tightening).

## Assets
All in `design/assets/` — move to `public/images/nitrodev/` (or the Vite asset pipeline):
- `brand/nitrodev-navy.png` — primary logo, navy on transparent (header light, 560×380 source).
- `brand/nitrodev-white.png` — inverted logo, white on transparent (header dark + footer).
- `harmonie.jpg` — Harmonie Rental Properties screenshot (hero + work card 1).
- `runningcalendar.jpg` — Running Calendar screenshot (work card 2).
- `uitsig.jpg` — Uitsig Kleuterskool screenshot (work card 3).
- `tightfit-mobile.png` — TightFit mobile screenshot (phone mockup, work card 4).

Icons are inline **Lucide**-style SVGs (2px stroke) embedded in the markup — keep inline or swap for
your project's icon system. No emoji anywhere. The small “bolt” in eyebrows/CTAs is a CSS
clip-path glyph (`.bolt`), not an image.

## Files
- `design/NitroDev.html` — the complete hi-fi prototype (all sections, both themes, all JS). This is
  the single source of truth; open it in a browser and read its `<style>`/`<script>` for any exact
  value not captured above.
- `design/assets/**` — image assets listed above.
