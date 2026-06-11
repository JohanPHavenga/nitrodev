<p align="center">
  <img src="https://raw.githubusercontent.com/JohanPHavenga/nitrodev/main/public/images/nitrodev/brand/nitrodev-navy.png" alt="NitroDev" height="48">
</p>

<h1 align="center">NitroDev — Freelance Web Development & Hosting</h1>

<p align="center">
  The source code for <a href="https://nitrodev.co.za">nitrodev.co.za</a> — a single-page portfolio site for NitroDev, a Cape Town-based freelance web development and hosting studio.
</p>

---

## About

NitroDev designs, develops and hosts modern websites for South African businesses. This repo is the marketing site: one scrollable page covering services, past work, process and contact details.

Built with **Laravel 12**, **Tailwind CSS v4**, **Alpine.js** and **Vite 8** — hand-coded, no page-builder or template involved.

## Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 (PHP 8.4) |
| CSS | Tailwind CSS v4 + custom design tokens |
| JS | Alpine.js v3 (theme toggle, mobile nav) |
| Build | Vite 8 + laravel-vite-plugin |
| Hosting | Managed South African hosting |

## Features

- Light / dark theme — toggled via Alpine.js store, persisted to `localStorage`, no flash on load
- Fully responsive — tested at desktop, tablet (980 px) and mobile (560 px)
- Reveal-on-scroll via `IntersectionObserver` (respects `prefers-reduced-motion`)
- No database required — all content lives in [`config/site.php`](config/site.php)
- Blade components for service cards, browser-frame work cards and phone-frame work cards

## Local Development

**Requirements:** PHP 8.4, Composer, Node 22+

```bash
git clone https://github.com/JohanPHavenga/nitrodev.git
cd nitrodev

composer install
cp .env.example .env
php artisan key:generate

npm install
```

Then in two terminals:

```bash
# Terminal 1 — PHP dev server
php artisan serve

# Terminal 2 — Vite HMR
npm run dev
```

Open `http://127.0.0.1:8000`.

For a production build:

```bash
npm run build
```

## Content

All copy, services, work samples and process steps are defined in a single file:

```
config/site.php
```

No database migrations are needed to run the site.

## Contact

- **Email:** info@nitrodev.co.za
- **WhatsApp:** [068 623 9340](https://wa.me/27686239340)
- **Based in:** Cape Town, South Africa

---

© 2026 NitroDev (Pty) Ltd. All rights reserved.
