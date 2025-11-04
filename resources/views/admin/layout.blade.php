<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  </head>

  <body class="bg-dark text-light">

    <div class="d-flex">
      
      {{-- Sidebar --}}
      @include('components.admin_sidebar')

      {{-- Main Content --}}
      <div class="flex-grow-1">
        @include('components.admin_header')

        <main class="p-4" style="min-height: 90vh;">
          @yield('content')
        </main>

        @include('components.admin_footer')
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
  </body>
</html>
