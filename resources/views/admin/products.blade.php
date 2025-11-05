@extends('admin.layout')

@section('title', 'Products')

@section('content')
<div class="container-fluid">
  <h3 class="mb-4">🛒 Products</h3>
 <div class="table-responsive shadow-lg rounded">
  <table class="table table-dark table-striped text-center">
    <thead class="table-success text-dark">
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td><img src="{{ asset('uploads/' . $product->product_image) }}" alt="" width="60"></td>
          <td>{{ $product->name }}</td>
          <td>₹{{ number_format($product->price, 2) }}</td>
          <td>{{ $product->stock ?? 'N/A' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
 </div>
</div>
@endsection
