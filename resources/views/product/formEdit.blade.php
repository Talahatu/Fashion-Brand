@extends('layouts.index')
@section('content')
    <h1>Update Product {{ $datas['name'] }}</h1>
    <form action="{{ route('product.update', $datas['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" name="productName" id="name" placeholder="Enter Product Name"
                value="{{ $datas['name'] }}">
        </div>
        <div class="form-group">
            <label for="productSize">Product Size </label>
            <input type="text" class="form-control" name="productSize" id="name" placeholder="Enter Product Size"
                value="{{ $datas['size'] }}">
        </div>
        <div class="form-group">
            <label for="productStock">Product Stock </label>
            <input type="number" min="0" max="1000" class="form-control" name="productStock" id="stock"
                placeholder="Enter Product Stock" value="{{ $datas['stock'] }}">
        </div>
        <div class="form-group">
            <label for="productPrice">Product Price </label>
            <input type="number" min="0" max="100000000" class="form-control" name="productPrice" id="price"
                placeholder="Enter Product Price" value="{{ $datas['price'] }}">
        </div>
        <div class="form-group">
            <label for="productURL">Product Image URL </label>
            <input type="text" class="form-control" name="productURL" id="name" placeholder="Enter Product Image URL"
                value="{{ $datas['url_gambar'] }}">
        </div>
        <div class="form-group">
            <label for="selectCategories">Categories</label>
            <select class="form-control" id="selectCategories" name="selectCategories">
                @foreach ($categories as $item)
                    @if ($item->id == $datas->categories_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="selectBrands">Brands</label>
            <select class="form-control" id="selectBrands" name="selectBrands">
                @foreach ($brands as $item)
                    @if ($item->id == $datas->brands_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="selectTypes">Types</label>
            <select class="form-control" id="selectTypes" name="selectTypes">
                @foreach ($types as $item)
                    @if ($item->id == $datas->types_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
