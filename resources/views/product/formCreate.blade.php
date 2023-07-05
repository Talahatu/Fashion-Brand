@extends('layouts.index')
@section('content')
    <h1>Create a New Product</h1>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" name="productName" id="name" placeholder="Enter product Name">
        </div>
        <div class="form-group">
            <label for="productSize">Product Size</label>
            <input type="text" class="form-control" name="productSize" id="size" placeholder="Enter Product Size">
        </div>
        <div class="form-group">
            <label for="productStock">Product Stock</label>
            <input type="number" min="0" max="1000" class="form-control" name="productStock" id="stock"
                placeholder="Enter Product Stock">
        </div>
        <div class="form-group">
            <label for="productPrice">Product Price </label>
            <input type="number" min="0" max="100000000" class="form-control" name="productPrice" id="price"
                placeholder="Enter Product Price">
        </div>
        <div class="form-group">
            <label for="productURL">Product URL </label>
            <input type="text" class="form-control" name="productURL" id="url"
                placeholder="Enter Product Image URL">
        </div>
        <div class="form-group">
            <label for="selectCategories">Categories</label>
            <select class="form-control" id="selectCategories" name="selectCategories">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="selectBrands">Brands</label>
            <select class="form-control" id="selectBrands" name="selectBrands">
                @foreach ($brands as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="selecTypes">Types</label>
            <select class="form-control" id="selectTypes" name="selectTypes">
                @foreach ($types as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
