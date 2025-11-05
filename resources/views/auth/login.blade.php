
  @include('header')
  <div class="login-card mx-auto" style="margin-bottom: 60px;">
    <h3><i class="bi bi-person-circle"></i> Sign In</h3>
    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label text-light" for="email" >Email Address</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email" required autocomplete="email" >
      </div>
      <div class="mb-3">
        <label class="form-label text-light" for="password" >Password</label>
        <input type="text" name="password"  id="password" class="form-control" placeholder="Enter your password" required>
      </div>
      <div class="d-flex justify-content-between mb-3">
        <div>
          <input type="checkbox" id="remember"> <label for="remember" class="small text-light">Remember me</label>
        </div>
        <a href="#" class="small text-decoration-none text-info">Forgot Password?</a>
      </div>
      <button type="submit" class="btn btn-login w-100">Login</button>

      <p class="text-center mt-3 form-text">
        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
      </p>

      <div class="social-login">
        <i class="bi bi-google"></i>
        <i class="bi bi-facebook"></i>
        <i class="bi bi-apple"></i>
      </div>
    </form>
  </div>
  @include('footer')
