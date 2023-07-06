@extends('layouts.index')
@section('content')
<h1>Edit Staff {{ $data['name'] }}</h1>
<form action="{{ route('staff.update', $data['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="inputName">Staff Name</label>
        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter Staff Name"
        value="{{$data['name']}}">
    </div>
    <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp"
            placeholder="Enter email" value="{{$data['email']}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
