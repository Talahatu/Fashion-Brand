@extends('layouts.index')
@section('content')
<h2>{{ $title }}:</h2>
    <div class="d-grid">
        <a href="{{ route('category.create') }}" class="btn btn-primary">Create New Category</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <br>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row justify-content-center">
                @foreach ($datas as $item)
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card text-black">
                            <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp"
                                class="card-img-top" alt="Apple Computer" />
                            <div class="card-body">
                                <div class="text-center">
                                    <h5 class="card-title"></h5>
                                    <p class="text-muted mb-4">{{ $item->name }}</p>
                                </div>
                                <div class="card-body d-grid gap-1">
                                    <div class="d-flex gap-2 flex-fill">
                                        <a href="{{ route('category.edit', $item->id) }}"
                                            class="btn btn-primary" style="width: 50%">Update</a>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                            class="flex-fill">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger" style="width: 50%"
                                                onclick="return confirm('Delete {{ $item->id }} - {{ $item->name }}?')">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection