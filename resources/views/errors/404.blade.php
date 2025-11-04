@include('header')
<div class="col-12 p-0 d-flex align-items-center justify-content-center text-center">
  <div class="col-lg-6 col-md-8 col-sm-10 px-3">
    <img src="{{ asset('img/error-404.svg') }}" alt="404 Error" style="height:50vh;" class="mt-5 img-fluid">
    <h2 class="text-light mt-3">404 Error - Page Not Found</h2>
    <a href="{{ route('index') }}" 
       class="btn btn-outline-light px-5 py-2 mt-4 w-75 w-md-auto">
       Retry
    </a>
  </div>
</div>
@include('footer')
