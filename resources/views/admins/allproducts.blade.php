@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Our Products</h5>
          <a  href="{{route('create.product')}}" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                  <tr>
                 <th scope="row">{{$product->id}}</th>
                 <td>{{$product->name}}</td>
                 <td><img src="{{asset('assets/images/'.$product->img.'')}}" width="100" height="100"></td>
                 <td><a href="{{route('delete.product',$product->id)}}" class="btn btn-danger  text-center ">delete</a></td>
              </tr>   
                @endforeach
             
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
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