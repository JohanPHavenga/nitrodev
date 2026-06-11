@extends('layouts.app')

@section('content')

{{-- ============ HERO ============ --}}
<section id="top" style="position:relative;overflow:hidden;scroll-margin-top:90px;">
  <div class="hero-grid-bg" aria-hidden="true"></div>
  <div class="hero-grid wrap-pad" style="max-width:1200px;margin:0 auto;padding-top:74px;padding-bottom:88px;padding-left:32px;padding-right:32px;">

    {{-- Copy --}}
    <div class="reveal">
      <span class="eyebrow" style="display:inline-flex;align-items:center;gap:8px;">
        <i class="bolt" aria-hidden="true"></i>Freelance Web Development &amp; Hosting
      </span>
      <h1 style="font-size:clamp(40px,5.2vw,68px);margin:20px 0 22px;">
        Fast, reliable websites — <span style="color:var(--accent-700);">built &amp; hosted</span>, end to end.
      </h1>
      <p style="font-size:19px;color:var(--slate);max-width:30em;margin-bottom:32px;">
        NitroDev designs, develops and hosts modern websites for South African businesses. One partner from first sketch to live site — and we keep it running.
      </p>
      <div style="display:flex;gap:14px;flex-wrap:wrap;">
        <a href="#contact"
          style="display:inline-flex;align-items:center;gap:9px;font-family:var(--font-sans);font-weight:700;font-size:14.5px;padding:12px 22px;border-radius:999px;background:var(--accent);color:#04222e;border:1.5px solid transparent;transition:transform .15s,background .2s,box-shadow .2s;white-space:nowrap;"
          onmouseover="this.style.background='var(--accent-700)';this.style.color='#fff';this.style.transform='translateY(-1px)';this.style.boxShadow='0 14px 30px -14px rgba(19,182,230,.8)'"
          onmouseout="this.style.background='var(--accent)';this.style.color='#04222e';this.style.transform='';this.style.boxShadow=''">
          <i class="bolt" aria-hidden="true"></i>Get a free quote
        </a>
        <a href="#work"
          style="display:inline-flex;align-items:center;gap:9px;font-family:var(--font-sans);font-weight:700;font-size:14.5px;padding:12px 22px;border-radius:999px;background:transparent;color:var(--ink);border:1.5px solid var(--line-strong);transition:transform .15s,background .2s,box-shadow .2s,border-color .2s;white-space:nowrap;"
          onmouseover="this.style.borderColor='var(--navy)';this.style.background='var(--card)'"
          onmouseout="this.style.borderColor='var(--line-strong)';this.style.background='transparent'">
          View recent work
        </a>
      </div>
      <div style="display:flex;gap:28px;margin-top:40px;flex-wrap:wrap;">
        <div><div style="font-family:var(--font-display);font-size:30px;font-weight:700;color:var(--ink);line-height:1;">25+</div><div style="font-size:13px;color:var(--muted);margin-top:5px;font-weight:600;">Sites launched</div></div>
        <div><div style="font-family:var(--font-display);font-size:30px;font-weight:700;color:var(--ink);line-height:1;">99.9%</div><div style="font-size:13px;color:var(--muted);margin-top:5px;font-weight:600;">Hosting uptime</div></div>
        <div><div style="font-family:var(--font-display);font-size:30px;font-weight:700;color:var(--ink);line-height:1;">15 yrs</div><div style="font-size:13px;color:var(--muted);margin-top:5px;font-weight:600;">Building for the web</div></div>
      </div>
    </div>

    {{-- Visual --}}
    <div class="reveal" style="position:relative;min-height:420px;">
      <div class="hero-card hv-main">
        <div class="browser-bar">
          <span style="width:11px;height:11px;border-radius:50%;background:#ff5f57;display:inline-block;"></span>
          <span style="width:11px;height:11px;border-radius:50%;background:#febc2e;display:inline-block;"></span>
          <span style="width:11px;height:11px;border-radius:50%;background:#28c840;display:inline-block;"></span>
          <span class="url">harmonieprop.co.za</span>
        </div>
        <img class="shot" src="{{ asset('images/nitrodev/harmonie.jpg') }}" alt="Harmonie Properties website">
      </div>
      <div class="hero-badge badge-speed">
        <div class="ic" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 3 14h7l-1 8 10-12h-7z"/></svg>
        </div>
        <div><div class="t">100 / 100</div><div class="s">PageSpeed score</div></div>
      </div>
      <div class="hero-badge badge-uptime">
        <div class="ic" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
        </div>
        <div><div class="t">Always online</div><div class="s">Managed hosting &amp; backups</div></div>
      </div>
    </div>

  </div>
</section>

{{-- ============ CLIENT STRIP ============ --}}
<div style="border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:var(--surface);">
  <div style="max-width:1200px;margin:0 auto;padding:22px 32px;display:flex;align-items:center;gap:32px;flex-wrap:wrap;justify-content:center;">
    <span style="font-size:12.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);">Trusted to build &amp; host</span>
    <div style="display:flex;gap:30px;flex-wrap:wrap;justify-content:center;">
      <span style="font-family:var(--font-display);font-size:18px;font-weight:600;color:var(--ink);opacity:.55;">Harmonie</span>
      <span style="font-family:var(--font-display);font-size:18px;font-weight:600;color:var(--ink);opacity:.55;">RunningCalendar</span>
      <span style="font-family:var(--font-display);font-size:18px;font-weight:600;color:var(--ink);opacity:.55;">Uitsig Kleuterskool</span>
      <span style="font-family:var(--font-display);font-size:18px;font-weight:600;color:var(--ink);opacity:.55;">TightFit</span>
    </div>
  </div>
</div>

{{-- ============ SERVICES ============ --}}
<section id="services" style="padding:96px 0;scroll-margin-top:90px;">
  <div style="max-width:1200px;margin:0 auto;padding:0 32px;">
    <div class="reveal" style="max-width:640px;margin-bottom:54px;">
      <span class="eyebrow" style="display:inline-flex;align-items:center;gap:8px;"><i class="bolt" aria-hidden="true"></i>What we do</span>
      <h2 style="font-size:clamp(30px,3.6vw,44px);margin:14px 0 16px;">Everything your site needs, under one roof.</h2>
      <p style="font-size:17.5px;color:var(--slate);">Design, build and hosting handled by one developer who answers the phone. No agencies, no hand-offs, no surprises.</p>
    </div>
    <div class="svc-grid">
      @foreach (config('site.services') as $service)
        <x-service-card
          :icon="$service['icon']"
          :title="$service['title']"
          :blurb="$service['blurb']"
          :bullets="$service['bullets']"
        />
      @endforeach
    </div>
  </div>
</section>

{{-- ============ WORK ============ --}}
<section id="work" style="padding:96px 0;background:var(--surface);scroll-margin-top:90px;">
  <div style="max-width:1200px;margin:0 auto;padding:0 32px;">
    <div class="reveal" style="max-width:640px;margin-bottom:54px;">
      <span class="eyebrow" style="display:inline-flex;align-items:center;gap:8px;"><i class="bolt" aria-hidden="true"></i>Selected work</span>
      <h2 style="font-size:clamp(30px,3.6vw,44px);margin:14px 0 16px;">Live sites, built &amp; hosted by NitroDev.</h2>
      <p style="font-size:17.5px;color:var(--slate);">A few recent projects — each designed, developed and kept online by us.</p>
    </div>
    <div class="work-grid">
      @foreach (config('site.work') as $item)
        @if ($item['variant'] === 'phone')
          <x-work-card-phone :item="$item" />
        @else
          <x-work-card :item="$item" />
        @endif
      @endforeach
    </div>
  </div>
</section>

{{-- ============ PROCESS ============ --}}
<section id="process" style="padding:96px 0;scroll-margin-top:90px;">
  <div style="max-width:1200px;margin:0 auto;padding:0 32px;">
    <div class="reveal" style="max-width:640px;margin-bottom:54px;">
      <span class="eyebrow" style="display:inline-flex;align-items:center;gap:8px;"><i class="bolt" aria-hidden="true"></i>How it works</span>
      <h2 style="font-size:clamp(30px,3.6vw,44px);margin:14px 0 16px;">A simple, no-jargon process.</h2>
      <p style="font-size:17.5px;color:var(--slate);">From first conversation to a live, looked-after website — here's how we get there.</p>
    </div>
    <div class="proc-grid">
      @foreach (config('site.process') as $step)
        <div class="reveal" style="position:relative;padding-top:30px;">
          <span style="position:absolute;top:7px;left:0;width:34px;height:3px;border-radius:2px;background:var(--accent);display:block;" aria-hidden="true"></span>
          <div style="font-family:var(--font-display);font-size:14px;font-weight:700;color:var(--accent-700);letter-spacing:.04em;">{!! $step['no'] !!}</div>
          <h3 style="font-size:19px;margin:12px 0 8px;">{!! $step['title'] !!}</h3>
          <p style="font-size:14.5px;color:var(--slate);">{{ $step['blurb'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ============ CONTACT / CTA ============ --}}
<section id="contact" style="background:var(--navy);color:#fff;position:relative;overflow:hidden;scroll-margin-top:90px;">
  <div class="cta-grid-bg" aria-hidden="true"></div>
  <div class="cta-grid wrap-pad cta-pad" style="position:relative;max-width:1200px;margin:0 auto;padding-top:88px;padding-bottom:88px;padding-left:32px;padding-right:32px;">

    <div class="reveal">
      <span class="eyebrow" style="color:var(--accent);display:inline-flex;align-items:center;gap:8px;"><i class="bolt" aria-hidden="true"></i>Let's build it</span>
      <h2 style="color:#fff;font-size:clamp(32px,4vw,48px);margin:14px 0 18px;">Need a website that's fast, modern and looked after?</h2>
      <p style="color:#c4d3e0;font-size:18px;max-width:30em;margin-bottom:30px;">Tell us a little about your project and we'll come back with a clear plan and a fair quote — usually within a day.</p>
      <div style="display:flex;gap:14px;flex-wrap:wrap;">
        <a href="mailto:info@nitrodev.co.za"
          style="display:inline-flex;align-items:center;gap:9px;font-family:var(--font-sans);font-weight:700;font-size:14.5px;padding:12px 22px;border-radius:999px;background:var(--accent);color:#04222e;border:1.5px solid transparent;transition:transform .15s,background .2s,box-shadow .2s;white-space:nowrap;"
          onmouseover="this.style.background='var(--accent-700)';this.style.color='#fff';this.style.transform='translateY(-1px)';this.style.boxShadow='0 14px 30px -14px rgba(19,182,230,.8)'"
          onmouseout="this.style.background='var(--accent)';this.style.color='#04222e';this.style.transform='';this.style.boxShadow=''">
          <i class="bolt" aria-hidden="true"></i>Get a free quote
        </a>
        <a href="https://wa.me/27686239340" target="_blank" rel="noopener"
          style="display:inline-flex;align-items:center;gap:9px;font-family:var(--font-sans);font-weight:700;font-size:14.5px;padding:12px 22px;border-radius:999px;background:transparent;color:#fff;border:1.5px solid rgba(255,255,255,.3);transition:transform .15s,background .2s,border-color .2s;white-space:nowrap;"
          onmouseover="this.style.borderColor='rgba(255,255,255,.6)';this.style.background='rgba(255,255,255,.07)'"
          onmouseout="this.style.borderColor='rgba(255,255,255,.3)';this.style.background='transparent'">
          WhatsApp us
        </a>
      </div>
    </div>

    {{-- Contact card --}}
    <div class="reveal" style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.14);border-radius:20px;padding:30px;">
      <div style="display:flex;align-items:center;gap:15px;padding:15px 0;border-bottom:1px solid rgba(255,255,255,.1);">
        <div style="width:42px;height:42px;border-radius:11px;background:rgba(19,182,230,.18);color:var(--accent);display:grid;place-items:center;flex:none;" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg>
        </div>
        <div>
          <div style="font-size:12px;color:#8fa6b8;font-weight:600;text-transform:uppercase;letter-spacing:.08em;">Email</div>
          <div style="font-size:16px;color:#fff;font-weight:600;">info@nitrodev.co.za</div>
        </div>
      </div>
      <div style="display:flex;align-items:center;gap:15px;padding:15px 0;border-bottom:1px solid rgba(255,255,255,.1);">
        <div style="width:42px;height:42px;border-radius:11px;background:rgba(19,182,230,.18);color:var(--accent);display:grid;place-items:center;flex:none;" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div>
          <div style="font-size:12px;color:#8fa6b8;font-weight:600;text-transform:uppercase;letter-spacing:.08em;">Phone &amp; WhatsApp</div>
          <div style="font-size:16px;color:#fff;font-weight:600;">068 623 9340</div>
        </div>
      </div>
      <div style="display:flex;align-items:center;gap:15px;padding:15px 0;">
        <div style="width:42px;height:42px;border-radius:11px;background:rgba(19,182,230,.18);color:var(--accent);display:grid;place-items:center;flex:none;" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div>
          <div style="font-size:12px;color:#8fa6b8;font-weight:600;text-transform:uppercase;letter-spacing:.08em;">Based in</div>
          <div style="font-size:16px;color:#fff;font-weight:600;">Cape Town, South Africa</div>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
