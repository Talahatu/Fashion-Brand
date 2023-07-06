@extends('layouts.index')
@section('content')
    <h1>Update Category {{ $datas['name'] }}</h1>
    <form action="{{ route('category.update', $datas['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" class="form-control" name="categoryName" id="name" placeholder="Enter Category Name"
                value="{{ $datas['name'] }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
