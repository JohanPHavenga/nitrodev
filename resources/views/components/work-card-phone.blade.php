@props(['item'])

<article class="work-card reveal"
  style="background:var(--card);border:1px solid var(--line);border-radius:20px;overflow:hidden;display:flex;flex-direction:column;transition:transform .22s,box-shadow .22s,border-color .22s;"
  onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='var(--shadow)';this.style.borderColor='var(--line-strong)';"
  onmouseout="this.style.transform='';this.style.boxShadow='';this.style.borderColor='var(--line)';">

  {{-- Phone frame --}}
  <div style="position:relative;background:linear-gradient(160deg,#13324f,#0a2438);padding:22px 22px 0;height:288px;overflow:hidden;display:flex;justify-content:center;align-items:flex-end;">
    <div class="phone-shell">
      <img class="phone-shot" src="{{ asset('images/nitrodev/' . $item['image']) }}" alt="{{ $item['title'] }} mobile site">
    </div>
  </div>

  {{-- Body --}}
  <div style="padding:24px 26px 26px;display:flex;flex-direction:column;flex:1;">
    <div style="font-size:11.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--accent-700);margin-bottom:8px;">{{ $item['category'] }}</div>
    <h3 style="font-size:23px;margin-bottom:10px;">{{ $item['title'] }}</h3>
    <p style="font-size:14.5px;color:var(--slate);margin-bottom:18px;flex:1;">{!! $item['blurb'] !!}</p>
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:18px;">
      @foreach ($item['tags'] as $tag)
        <span style="font-size:12px;font-weight:600;color:var(--slate);background:var(--surface);border:1px solid var(--line);border-radius:999px;padding:5px 12px;">{{ $tag }}</span>
      @endforeach
    </div>
    <a href="{{ $item['url'] }}" target="_blank" rel="noopener"
      style="display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:14px;color:var(--link);">
      Visit live site
      <svg class="visit-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="transition:transform .18s;"><path d="M7 17 17 7M9 7h8v8"/></svg>
    </a>
  </div>

</article>
