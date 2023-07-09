@extends('layouts.index')

@section('content')
    @if (Session::has('status'))
        <p id="statusAlert" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
    @endif

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
                                <li class="list-group-item">Type: {{ $item->type->name }}</li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <a href="{{ route('addToCart', $item->id) }}" class="btn btn-primary btn-block">Add to
                                Keranjang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("a").on("click", function() {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
        const statusAlert = $('#statusAlert');

        // Wait for 5 seconds and then fade out the element
        setTimeout(function() {
            statusAlert.fadeOut();
        }, 4000);
    </script>
@endsection
