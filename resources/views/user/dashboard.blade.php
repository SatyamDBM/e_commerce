@include('header')
<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6 mx-auto border border-1 py-3 mt-5  text-light">
        <form action="{{route('upload.photo')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $user->id }}">
       <h3 class="d-flex justify-content-center position-relative text-center">
  <!-- Profile Icon -->
   @if($user->profile_photo)
<img src="{{ asset('uploads/'.$user->profile_photo) }}" 
                   alt="Profile Photo" 
                   class="rounded-circle border border-2 border-light"
                   style="width:100px; height:100px; object-fit:cover;">
   @else
  <i class="fa-solid fa-user border border-1 rounded-circle bg-light text-dark d-flex align-items-center justify-content-center"style="width:80px; height:80px; font-size:40px;"></i>
  @endif
<label for="file" 
                   class="position-absolute bg-dark text-light rounded-circle ps-2 pe-1 pb-1 shadow"
                   style="bottom:5px; right:calc(50% - 45px); cursor:pointer;">
              <i class="fa-regular fa-pen-to-square fs-5"></i>
            </label>
  <input type="file" name="file" id="file" hidden onchange="this.form.submit()">
</h3>
</form>
        <h2 class="text-center">{{$user->name}}</h2>
        <div class="px-5 pt-5 pb-3">
        <p>User_ID : {{$user->id}}</p>
        <p>Email : {{$user->email}}</p>
        <p>Mobile : {{$user->mobile}}</p>
        <p>Address : {{$user->address}}</p>
        <p class="text-end"><a href="{{route('logout')}}" class="btn btn-outline-dark border border-2 text-light">LogOut</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')
