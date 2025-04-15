@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_3.jpg')}});" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Our List</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>List</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>
<section style="margin-top: 40px;">
    <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
        <div class="row">
            @foreach ($fulllist as $value)
            <div class="col-md-3 ">
                <div class="menu-entry">
                    <a href="{{ route('product.single', $value->id) }}" class="img" style="background-image: url({{ asset('assets/images/' . $value->img.'') }});"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="{{ route('product.single', $value->id) }}">{{ $value->name }}</a></h3>
                        <p><a href="{{ route('product.single', $value->id) }}" class="btn btn-primary btn-outline-primary">Show</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        
</section>
@endsection