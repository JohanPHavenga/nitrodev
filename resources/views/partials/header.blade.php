<header id="hdr"
  x-data="{ open: false, scrolled: false }"
  x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 8 }, { passive: true }); scrolled = window.scrollY > 8"
  :class="{ 'scrolled': scrolled }">

  <div style="max-width:1200px;margin:0 auto;padding:0 32px;display:flex;align-items:center;justify-content:space-between;height:74px;">

    {{-- Logo --}}
    <a href="#top" aria-label="NitroDev home" style="display:flex;align-items:center;">
      <img class="logo-light" src="{{ asset('images/nitrodev/brand/nitrodev-navy.png') }}" alt="NitroDev" style="height:30px;width:auto;">
      <img class="logo-dark"  src="{{ asset('images/nitrodev/brand/nitrodev-white.png') }}" alt="NitroDev" style="height:30px;width:auto;">
    </a>

    {{-- Nav links --}}
    <nav class="navlinks" id="navlinks" :class="{ 'open': open }" aria-label="Main navigation">
      <a href="#services" @click="open=false" style="font-size:14.5px;font-weight:600;color:var(--slate);transition:color .15s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--slate)'">Services</a>
      <a href="#work"     @click="open=false" style="font-size:14.5px;font-weight:600;color:var(--slate);transition:color .15s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--slate)'">Work</a>
      <a href="#process"  @click="open=false" style="font-size:14.5px;font-weight:600;color:var(--slate);transition:color .15s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--slate)'">Process</a>
      <a href="#contact"  @click="open=false" style="font-size:14.5px;font-weight:600;color:var(--slate);transition:color .15s;" onmouseover="this.style.color='var(--ink)'" onmouseout="this.style.color='var(--slate)'">Contact</a>
    </nav>

    {{-- Actions --}}
    <div style="display:flex;align-items:center;gap:10px;">
      {{-- Theme toggle --}}
      <button
        aria-label="Toggle dark mode"
        @click="$store.theme.toggle()"
        style="display:inline-grid;place-items:center;width:42px;height:42px;border-radius:11px;border:1.5px solid var(--line-strong);background:var(--card);color:var(--ink);cursor:pointer;transition:border-color .15s,background .2s,color .2s;">
        <svg class="i-moon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        <svg class="i-sun"  width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
      </button>
      {{-- Hamburger --}}
      <button
        class="menu-toggle"
        id="menuToggle"
        aria-label="Menu"
        :aria-expanded="open.toString()"
        @click="open = !open"
        style="display:none;place-items:center;width:44px;height:44px;border-radius:11px;border:1.5px solid var(--line-strong);background:var(--card);cursor:pointer;color:var(--ink);">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
      </button>
    </div>

  </div>
</header>
