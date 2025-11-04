<!-- ===== Footer Start ===== -->
<footer class="footer bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row gy-4">

            <!-- Logo + About -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('img/logo.svg') }}" 
                         alt="Logo" 
                         height="50" 
                         class="me-2"  
                         data-aos="zoom-out-down" 
                         data-aos-duration="3000">
                    <h5 class="fw-bold" 
                        data-aos="zoom-out-left" 
                        data-aos-duration="3000">
                        E_Commerce
                    </h5>
                </div>

                <p class="text-light small">
                    Bringing you the best products at the best prices — shop smart, shop with style.
                </p>

                <div class="social-icons mt-3">
                    <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                    <a href="https://x.com/"><i class="bi bi-twitter"></i></a>
                    <a href="https://in.linkedin.com/"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Customer Support -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Customer Support</h6>
                <ul class="list-unstyled">
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3">Stay Updated</h6>
                <p class="text-light small">Subscribe to get the latest deals and offers.</p>
                <form class="newsletter-form">
                    <input type="email" 
                           id="footerEmail" 
                           name="email" 
                           placeholder="Enter your email" 
                           required 
                           autocomplete="email">
                    <button type="submit"><i class="bi bi-send-fill"></i></button>
                </form>
            </div>

        </div>

        <hr class="my-4 text-light">

        <div class="text-center small text-light">
            © {{ date('Y') }} E_Commerce. All Rights Reserved. | Designed by Aviral 💻
        </div>
    </div>
</footer>
<!-- ===== Footer End ===== -->

<!-- Login Modal  start-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 overflow-hidden border-0 shadow-lg">

            <div class="row g-0">

                <!-- Left Section -->
                <div class="col-md-5 d-none d-md-flex flex-column justify-content-center align-items-center text-white text-center p-4"
                     style="background: linear-gradient(160deg, #000 60%, #1a1a1a);">
                    <img src="{{ asset('img/logo.svg') }}" alt="Croma Logo" height="60" class="mb-3">
                    <h4 class="fw-semibold mb-2">Welcome to Croma</h4>
                    <p class="text-light small mb-0">
                        Explore premium electronics & exciting offers, all in one place.
                    </p>
                </div>

                <!-- Right Section -->
                <div class="col-md-7 bg-white text-center position-relative d-flex flex-column justify-content-center align-items-center p-5">
                    <button type="button" 
                            class="btn-close position-absolute end-0 top-0 m-3" 
                            data-bs-dismiss="modal" 
                            aria-label="Close">
                    </button>

                    <h5 class="fw-bold fs-4 mb-4 text-dark">Login or Create Account</h5>

                    <div class="d-grid gap-3 w-75">
                        <a href="{{ route('login') }}" class="btn btn-success btn-lg fw-semibold py-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg fw-semibold py-3">
                            <i class="bi bi-person-plus me-2"></i> Sign Up
                        </a>
                    </div>

                    <p class="small text-muted mt-4">
                        By continuing, you agree to our
                        <a href="#" class="text-decoration-none text-dark">Terms of Use</a> &
                        <a href="#" class="text-decoration-none text-dark">Privacy Policy</a>.
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- login modal end -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    window.appData = {
        isLoggedIn: @json(Auth::check()),
        loginUrl: "{{ route('login') }}"
    };

    AOS.init();
</script>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
