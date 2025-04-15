@extends('layouts.admin')
@section('content')
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Borrwed Books</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">{{$viewuser->id}}</th>
        <td>{{$viewuser->name}}</td>
        <td>{{$viewuser->email}}</td>
        <td>{{$viewuser->borrowed_books}}</td>
        </tr>
    </tbody>
  </table>
@endsection