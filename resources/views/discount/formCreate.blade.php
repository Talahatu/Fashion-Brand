@extends('layouts.index')
@section('content')
    <h1>Create a New Discount</h1>
    <form action="{{ route('discount.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="discountName">Discount Name</label>
            <input type="text" class="form-control" name="discountName" id="name" placeholder="Enter Discount Name">
        </div>
        <div class="form-group">
            <label for="discountValue">Discount Value </label>
            <input type="number" min="0.1" max="0.7" step="0.1" class="form-control" name="discountValue" id="nominal"
                placeholder="Enter Value Discount">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
