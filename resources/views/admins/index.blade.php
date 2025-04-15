@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Borrowed Books</h5>
          <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
          <p class="card-text">Number of borrowed books: {{$borrowedBooks}}</p>
         
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Books</h5>
          
          <p class="card-text">Number of books: {{$allbooks}}</p>
          
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Users</h5>
          
          <p class="card-text">Number of users: {{$allusers}}</p>
          <form action="{{ route('admin.viewuser') }}" method="GET" class="form-inline">
            <input type="text" class="form-control mr-2" style="margin-bottom: 10px;" name="userId" placeholder="Search by User ID">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        
          
          
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>
          
          <p class="card-text">Number of admins: {{$alladmins}}</p>
          <a  href="{{route('create.admin')}}" class="btn btn-primary mx-auto d-block">Create Admin</a>
        </div>
      </div>
    </div>
  </div>  
@endsection