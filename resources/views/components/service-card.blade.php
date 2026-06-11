@props(['icon', 'title', 'blurb', 'bullets'])

<div class="svc reveal"
  style="background:var(--card);border:1px solid var(--line);border-radius:16px;padding:32px 30px;transition:transform .2s,box-shadow .2s,border-color .2s;"
  onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='var(--shadow)';this.style.borderColor='var(--line-strong)';"
  onmouseout="this.style.transform='';this.style.boxShadow='';this.style.borderColor='var(--line)';">

  <div style="width:52px;height:52px;border-radius:13px;background:var(--navy);color:#fff;display:grid;place-items:center;margin-bottom:22px;">
    @if ($icon === 'code')
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
    @elseif ($icon === 'database')
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/><path d="M3 12c0 1.66 4 3 9 3s9-1.34 9-3"/></svg>
    @elseif ($icon === 'monitor')
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="M6 8h.01M10 8h4"/></svg>
    @endif
  </div>

  <h3 style="font-size:21px;margin-bottom:10px;">{!! $title !!}</h3>
  <p style="font-size:15px;color:var(--slate);margin-bottom:18px;">{{ $blurb }}</p>

  <ul style="list-style:none;display:flex;flex-direction:column;gap:9px;">
    @foreach ($bullets as $bullet)
      <li style="font-size:14px;color:var(--slate);display:flex;align-items:flex-start;gap:10px;font-weight:500;">
        <span style="flex:none;width:7px;height:7px;border-radius:50%;background:var(--accent);margin-top:7px;display:inline-block;"></span>
        {!! $bullet !!}
      </li>
    @endforeach
  </ul>
</div>
