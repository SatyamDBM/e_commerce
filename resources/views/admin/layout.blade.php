<!doctype html>
<html>
  <head>
    <!-- meta, css links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  </head>
  <body>
    <div class="admin-sidebar">
      @include('components.admin_sidebar')  {{-- your nav links --}}
    </div>

    <div class="sidebar-overlay"></div>

    <div class="admin-content">
      <header class="admin-header">
        <div class="left">
          <button class="menu-toggle" aria-label="Open menu">☰</button>
          <h5>Admin Panel</h5>
        </div>
        <div class="header-actions">
          {{-- search / profile / logout --}}
        </div>
      </header>

      <main class="admin-main">
        @yield('content')
      </main>

      <footer class="admin-footer">
        © {{ date('Y') }} • Admin
      </footer>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
  </body>
</html>
