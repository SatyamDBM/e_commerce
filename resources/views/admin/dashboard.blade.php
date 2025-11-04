@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
  <h3 class="mb-4">🧰 Admin Dashboard</h3>

  <div class="row g-3">
    <div class="col-md-4">
      <div class="card bg-success text-white text-center p-4">
        <h4>Total Users</h4>
        <p>{{ $usersCount }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-primary text-white text-center p-4">
        <h4>Total Products</h4>
        <p>{{ $productsCount }}</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-dark text-center p-4">
        <h4>Total Orders</h4>
      </div>
    </div>
  </div>
</div>
@endsection
