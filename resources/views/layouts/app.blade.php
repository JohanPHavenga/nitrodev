<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NitroDev — Freelance Web Development &amp; Hosting</title>

  {{-- Anti-FOUC: apply persisted theme before first paint --}}
  <script>
    (function () {
      if (localStorage.getItem('nitrodev-theme') === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
      }
    })();
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  @include('partials.header')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

</body>
</html>
