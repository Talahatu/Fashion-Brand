@extends('layouts.index')
@section('content')
    <h1>Update Type {{ $datas['name'] }}</h1>
    <form action="{{ route('type.update', $datas['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="typeName">Type Name</label>
            <input type="text" class="form-control" name="typeName" id="name" placeholder="Enter Type Name"
                value="{{ $datas['name'] }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
