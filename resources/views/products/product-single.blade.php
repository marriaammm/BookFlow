@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_3.jpg')}});" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Book Details</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Book Details</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mb-5 ftco-animate">
                  <a  name="img"  href="{{asset('assets/images/'.$product->img.'')}}" class="image-popup"><img src="{{asset('assets/images/'.$product->img.'')}}" class="img-fluid" alt="Colorlib Template"></a>
              </div>
              <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                  <h3 name="name" class="text-white mb-4">{{$product->name}}</h3>
                  <p >{{$product->descrebtion}} </p>
                      <div class="row mt-4">
                          <div class="col-md-6">
                              <div class="form-group d-flex">
                    <div class="select-wrap">
                    
                  </div>
                  </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="input-group col-md-6 d-flex mb-3">
              
                      
                </div>
            </div>
            <form action="{{route('add.list' , $product->id)}}" method="POST">
              @csrf
              @guest
              <button type="button" class="btn btn-primary py-3 px-5" onclick="location.href='{{ route('login') }}'">Login to Borrow</button>
          @else
              @if ($checkingInList == 0)
                  <button type="submit" name="submit" class="btn btn-primary py-3 px-5">Borrow</button>
              @else
                  <button style="background-color: black" class="text-white btn btn-warning py-3 px-5" disabled>Borrowed</button>
              @endif
          @endguest
                 </form>
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
</body>
</html>

@endsection