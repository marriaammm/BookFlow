@extends('layouts.app')

@section('content')
 <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_1.jpg')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Welcome to your virtual literary sanctuary</h1>
            <p class="mb-4 mb-md-5">Explore endless knowledge, read classics and discover new stories in our vast online library.</p>
            <p><a href="{{route('list')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">View Borrowed Books </a> <a href="{{route('fulllist')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Book List</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_2.jpg')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Discover books, explore &amp; get inspired  </h1>
            <p class="mb-4 mb-md-5">Unlock a world of literature, access digital books, and enrich your mind with our online library.</p>
            <p><a href="{{route('list')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">View Borrowed Books </a> <a href="{{route('fulllist')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Book List</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_3.jpg')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Embrace knowledge at our online library</h1>
            <p class="mb-4 mb-md-5">Dive into literary treasures, embark on adventures, and expand your horizons with our virtual book collection.</p>
            <p><a href="{{route('list')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">View Borrowed Books </a> <a href="{{route('fulllist')}}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Book List</a></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-intro">
      <div class="container-wrap">
          <div class="wrap d-md-flex align-items-xl-end">
          </div>
      </div>
  </section>

  <section style="margin-top:150px;" class="ftco-about d-md-flex">
      <div class="one-half img" style="background-image: url({{asset('assets/images/about.jpg')}});"></div>
      <div class="one-half ftco-animate">
          <div class="overlap">
          <div class="heading-section ftco-animate ">
              <span class="subheading">Discover</span>
            <h2 class="mb-4">Our Story</h2>
          </div>
          <div>
                    <p>Welcome to our library's captivating story. As you embark on your literary journey, you'll encounter a diverse world of words, where each page holds the promise of new adventures. Our collection, carefully curated over time, invites you to explore the wonders of literature. Join us in this realm of knowledge and imagination, where books come alive.</p>
                </div>
            </div>
      </div>
  </section>


  <section class="ftco-section">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-6 pr-md-5">
                  <div class="heading-section text-md-right ftco-animate">
                <span class="subheading">Discover</span>
              <h2 class="mb-4">Our Books</h2>
              <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
              <p><a href="{{route('fulllist')}}" class="btn btn-primary btn-outline-primary px-4 py-3">View Full List</a></p>
            </div>
              </div>
              <div class="col-md-6">
                  <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-6">
                      <div class="menu-entry">
                          <a href="{{route('product.single',$product->id)}}" class="img" style="background-image: url({{asset('assets/images/'.$product->img.'')}});"></a>
                      </div>
                  </div>
                    @endforeach
                    
                  </div>
              </div>
          </div>
      </div>
  </section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{asset('assets/images/bg_2.jpg')}});" > 
          <div class="overlay"></div>
  </section>

 <!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>  -->
@endsection
