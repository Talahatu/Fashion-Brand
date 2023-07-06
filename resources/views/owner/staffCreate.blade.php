@extends('layouts.index')
@section('content')
<h1>Add New Staff</h1>
<form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data" role="form">
    @csrf
    <div class="form-group">
        <label for="inputName">Staff Name</label>
        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter Staff Name">
    </div>
    <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp"
            placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
