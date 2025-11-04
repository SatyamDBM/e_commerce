<div class="bg-black vh-100 p-3" style="width:240px; position:sticky; top:0;">
  <h4 class="text-success mb-4">🧩 Admin</h4>
  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="{{ route('admin.dashboard') }}" class="nav-link text-light">📊 Dashboard</a>
    </li>
    <li class="nav-item mb-2">
      <a href="" class="nav-link text-light">👥 Users</a>
    </li>
    <li class="nav-item mb-2">
      <a href="" class="nav-link text-light">🛒 Products</a>
    </li>
    <li class="nav-item mb-2">
      <a href="" class="nav-link text-light">📦 Orders</a>
    </li>
    <li class="nav-item mt-4">
      <a href="{{ route('logout') }}" class="btn btn-danger w-100">Logout</a>
    </li>
  </ul>
</div>
