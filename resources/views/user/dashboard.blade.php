@include('header')

<div class="container py-5 text-light">
  <div class="row justify-content-center">
    <div class="col-sm-8 col-md-6 col-lg-5">
      <h2 class="text-center text-light mb-5 mt-3">User DashBoard</h2>

      <!-- ===== Profile Card ===== -->
      <div class="card bg-dark border border-secondary shadow-lg mb-5">
        <div class="card-body text-center">

          <!-- ===== Profile Photo Form ===== -->
          <form action="{{ route('upload.photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">

            <!-- ===== Profile Photo / Default Icon ===== -->
            <div class="position-relative d-inline-block mb-3">
              @if($user->profile_photo)
                <img 
                  src="{{ asset('uploads/'.$user->profile_photo) }}" 
                  alt="Profile Photo" 
                  class="rounded-circle border border-2 border-light"
                  style="width: 100px; height: 100px; object-fit: cover;"
                >
              @else
                <i 
                  class="fa-solid fa-user border border-1 rounded-circle bg-light text-dark d-flex align-items-center justify-content-center"
                  style="width: 100px; height: 100px; font-size: 40px;"
                ></i>
              @endif

              <!-- Edit Icon Overlay -->
              <label 
                for="file" 
                class="position-absolute bg-dark text-light rounded-circle shadow"
                style="bottom: 5px; right: 5px; cursor: pointer; padding: 5px 8px;"
              >
                <i class="fa-regular fa-pen-to-square fs-5"></i>
              </label>

              <input 
                type="file" 
                name="file" 
                id="file" 
                hidden 
                onchange="this.form.submit()"
              >
            </div>
          </form>

          <!-- ===== User Name ===== -->
          <h3 class="text-light mb-3">{{ $user->name }}</h3>

          <!-- ===== User Details ===== -->
          <div class="text-start px-4">
            <p><strong>User ID:</strong> {{ $user->id }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Mobile:</strong> {{ $user->mobile }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
          </div>

          <!-- ===== Logout Button ===== -->
          <div class="text-end px-4">
            <a 
              href="{{ route('logout') }}" 
              class="btn btn-outline-light border-2"
            >
              Log Out
            </a>
          </div>

        </div>
      </div>
      <!-- ===== End Profile Card ===== -->

    </div>
  </div>
</div>

@include('footer')
