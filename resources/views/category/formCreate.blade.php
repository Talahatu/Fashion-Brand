@extends('layouts.index')
@section('content')
    <h1>Create a New Category</h1>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" class="form-control" name="categoryName" id="name" placeholder="Enter Category Name">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
