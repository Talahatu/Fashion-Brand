@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($products as $item)
                <div class="col-sm-2">
                    <div class="panel panel-default" style="width: 18rem;">
                        <img src="{{ $item->url_gambar }}" class="img-rounded img-thumbnail" alt="{{ $item->nama }}">
                        <div class="panel-body">
                            <h5 class="card-title"><strong> {{ $item->name }}</strong></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Rp. {{ $item->price }}</li>
                                <li class="list-group-item">{{ $item->stock }} pcs</li>
                                <li class="list-group-item">Size: {{ $item->size }}</li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <a href="#" class="btn btn-primary btn-block">Add to Keranjang</a>
                            <a href="#" class="btn btn-info btn-block">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('script')
    {{-- janky AF --}}
    <script>
        $(".active").removeClass("active");
        console.log(
            $('a span:contains("Category")').parent().parent().addClass("active"))

        $("a").on("click", function() {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    </script>
@endsection
