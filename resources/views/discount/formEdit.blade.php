@extends('layouts.index')
@section('content')
    <h1>Update Discount {{ $datas['name'] }}</h1>
    <form action="{{ route('discount.update', $datas['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="discountName">Discount Name</label>
            <input type="text" class="form-control" name="discountName" id="name" placeholder="Enter Discount Name"
                value="{{ $datas['name'] }}">
        </div>
        <div class="form-group">
            <label for="discountValue">Discount Value </label>
            <input type="number" min="0.1" max="0.7" step="0.1" class="form-control" name="discountValue" id="nominal"
                placeholder="Enter Value Discount" value="{{ $datas['nominal'] }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
