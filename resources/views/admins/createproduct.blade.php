@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Product</h5>
      <form method="POST" action="{{route('store.product')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
            </div>
            <div class="form-outline mb-4 mt-4">
              <input type="file" name="image" id="form2Example1" class="form-control"  />
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea name="descrebtion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
          </form>
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