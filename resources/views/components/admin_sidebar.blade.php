<div class="sidebar">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-success">🧩 Admin</h4>
    <button class="btn btn-sm btn-outline-light d-lg-none" id="toggleMenu">☰</button>
  </div>

  <ul class="nav flex-column" id="menuItems">
    <li class="nav-item mb-2"><a href="{{ route('admin.dashboard') }}" class="nav-link text-light">📊 Dashboard</a></li>
    <li class="nav-item mb-2"><a href="{{ route('user_details') }}" class="nav-link text-light">👥 Users</a></li>
    <li class="nav-item mb-2"><a href="{{ route('product_details') }}" class="nav-link text-light">🛒 Products</a></li>
    <li class="nav-item mb-2"><a href="{{ route('order_details') }}" class="nav-link text-light">📦 Orders</a></li>
    <li class="nav-item mt-4"><a href="{{ route('logout') }}" class="btn btn-danger w-100" onclick = "return confirm ('Do you want it . . \nLogOut..')">Logout</a></li>
  </ul>
</div>
