@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('assets/images/bg_3.jpg')}});" >
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread">Borrowed Books</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Borrowed</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>
      
      <section class="ftco-section ftco-cart">
          <div class="container">
              <div class="row">
              <div class="col-md-12 ftco-animate">
                  @if(session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif
                  @if(session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                  <div class="cart-list">
                    <table class="table-dark" style="width: 100%">
                        <thead style="background-color: #9c7b4d; height: 60px;">
                            <tr  class="text-center">
                                <th>&nbsp;</th>
                                <th>Product Image</th>
                                <th>Product</th>
                                <th>Product ID</th>
                                <th>Borrowed At</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr class="text-center" style="background-color:rgb(46, 42, 42)  ;height: 100px">
                                <td class="product-remove"><a href="{{route('retunToShelf', $item->id)}}" class="btn btn-primary py-3 px-5">Return Book</a></td>                                <td class="image-prod"><img width="130" height="130" src="{{ asset('assets/images/' . $item->img) }}" alt="{{ $item->name }}"></td>
                                <td class="product-name">
                                    <h3>{{ $item->name }}</h3>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pivot->created_at->format('F j, Y g:i A') }}</td>

                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    </div>
              </div>
          </div>
          <div class="row justify-content-end">
          </div>
          </div>
      </section>
@endsection