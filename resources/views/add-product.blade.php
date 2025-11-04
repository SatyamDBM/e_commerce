@include('header')

<div class="container my-5 text-light">
  <div class="row justify-content-center">
    <div class="col-md-6 bg-dark p-4 rounded">
      <h3 class="text-center mb-4">Add Product</h3>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Product Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Cross Price</label>
          <input type="number" name="cross_price" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Offer Price</label>
          <input type="number" name="offer_price" class="form-control" required>
        </div>
<div class="mb-3">
  <label class="form-label">Discount Percent (%)</label>
  <input type="number" name="discount_percent" class="form-control" min="0" max="100" placeholder="e.g. 10">
</div>

        <div class="mb-3">
          <label class="form-label">Product Image</label>
          <input type="file" name="product_image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Upload Product</button>
      </form>
    </div>
  </div>
</div>

@include('footer')
