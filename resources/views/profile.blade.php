@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_2.jpg')}});" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Update Profile</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Update Profile</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>
<div class="container">
    <section class="ftco-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 ftco-animate">
              <form method="POST" action="{{ route('profile.update') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                @csrf         
                @method('PUT')
                  <h3 class="mb-4 billing-heading">Update</h3>
                    <div class="row align-items-end">
                   <div class="col-md-12">
                          <div class="form-group">
                              <label for="Username">New Name</label>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                   </div>
                      <div class="col-md-12">
                      <div class="form-group">
                          <label for="Email">New Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                   
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="Password">New Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
    
                  </div>
                  <div class="col-md-12">
                      <div class="form-group mt-4">
                              <div class="radio">
                                  <button class="btn btn-primary py-3 px-4">Update Profile</button>
                              </div>
                      </div>
                  </div>
    
                 
                </form><!-- END -->
            </div> <!-- .col-md-8 -->
            </div>
          </div>
        </div>
      </section>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      $(document).ready(function() {
          @if(session('success'))
              var successMessage = "{{ session('success') }}";
              alert(successMessage);
          @endif
      });
      </script>
   <!--   <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
        </div>


        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>-->
</div>
@endsection
