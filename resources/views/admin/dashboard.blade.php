@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <h3 class="mb-4 fw-bold text-light">🧰 Admin Dashboard</h3>

    <div class="row g-4">

        <!-- 🧍‍♂️ Users Card -->
        <div class="col-12 col-sm-12 col-md-4">
            <a href="{{ route('user_details') }}" class="text-decoration-none">
                <div id="users-card" class="dashboard-card users-card text-center text-white p-4 h-100">
                    <div class="mb-3 fs-1 text-info">👥</div>
                    <h5 class="fw-bold">Total Users</h5>
                    <p class="display-6 fw-semibold mb-0">{{ number_format($usersCount) }}</p>
                </div>
            </a>
        </div>

        <!-- 🛒 Products Card -->
        <div class="col-12 col-sm-12 col-md-4">
            <a href="{{ route('product_details') }}" class="text-decoration-none">
                <div id="products-card" class="dashboard-card products-card text-center text-white p-4 h-100">
                    <div class="mb-3 fs-1 text-warning">🛍️</div>
                    <h5 class="fw-bold">Total Products</h5>
                    <p class="display-6 fw-semibold mb-0">{{ number_format($productsCount) }}</p>
                </div>
            </a>
        </div>

        <!-- 📦 Orders Card -->
        <div class="col-12 col-sm-12 col-md-4">
            <a href="{{ route('order_details') }}" class="text-decoration-none">
                <div id="orders-card" class="dashboard-card orders-card text-center text-white p-4 h-100">
                    <div class="mb-3 fs-1 text-success">📦</div>
                    <h5 class="fw-bold">Total Orders</h5>
                    <p class="display-6 fw-semibold mb-0">{{ number_format($ordersCount) }}</p>
                </div>
            </a>
        </div>

    </div>
</div>

{{-- Custom Styles --}}
<style>
/* 🔹 Common Dashboard Card Style */
.dashboard-card {
    background: linear-gradient(145deg, #111827, #1f2937);
    border-radius: 18px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(0, 255, 204, 0.08);
}
.dashboard-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 0 25px rgba(0, 255, 204, 0.25);
}

/* 🔹 Unique Card Themes */
.users-card {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
}
.products-card {
    background: linear-gradient(135deg, #42275a, #734b6d);
}
.orders-card {
    background: linear-gradient(135deg, #134e5e, #71b280);
}

/* --- Responsive --- */
@media (max-width: 992px) {
  .row.g-4 > .col-md-4 {
    flex: 0 0 50%;
    max-width: 50%;
  }
}

@media (max-width: 768px) {
  .row.g-4 > .col-md-4 {
    flex: 0 0 100%;
    max-width: 100%;
  }
  .dashboard-card {
    padding: 28px 20px;
    margin-bottom: 15px;
  }
}

@media (max-width: 430px) {
  .row.g-4 > .col-md-4 {
    flex: 0 0 100%;
    max-width: 100%;
  }
  .dashboard-card {
    padding: 32px 24px;
    font-size: 1rem;
    margin-bottom: 22px;
  }
  .dashboard-card h5 {
    font-size: 1.1rem;
  }
  .dashboard-card p {
    font-size: 1.4rem;
  }
}
</style>
@endsection
