@include('header')

<div class="register-card mx-auto mt-5">
  <h3><i class="bi bi-person-plus-fill"></i> Create Account</h3>

  <form action="{{ route('register.store') }}" method="POST" autocomplete="off">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label text-light">Full Name</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" autocomplete="new-name" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label text-light">Email Address</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="new-email" required>
    </div>

    <div class="mb-3">
      <label for="mobile" class="form-label text-light">Mobile Number</label>
      <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number (optional)" autocomplete="off">
    </div>

    <div class="mb-3">
      <label for="address" class="form-label text-light">Address</label>
      <textarea id="address" name="address" class="form-control" rows="2" placeholder="Enter your address (optional)" autocomplete="off"></textarea>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label text-light">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" autocomplete="new-password" required>
    </div>

    <div class="mb-3">
      <label for="confirm_password" class="form-label text-light">Confirm Password</label>
      <input type="password" id="confirm_password" name="password_confirmation" class="form-control" placeholder="Re-enter your password" autocomplete="new-password" required>
    </div>

    <button type="submit" class="btn btn-register w-100">Register</button>

    <p class="text-center mt-3 form-text">
      Already have an account? <a href="{{ route('login') }}">Login here</a>
    </p>
  </form>
</div>
@include('footer')
