@extends('layouts.index')
@section('content')
    <h1>Create a New Type</h1>
    <form action="{{ route('type.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="typeName">Type Name</label>
            <input type="text" class="form-control" name="typeName" id="name" placeholder="Enter Type Name">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
