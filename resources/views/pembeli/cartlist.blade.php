@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($carts as $key => $cart)
                @php
                    $item = $cart["product"];
                    $q = $cart["quantity"];
                @endphp
                <div class="col-sm-2">
                    <div class="panel panel-default" style="width: 18rem;">
                        <img src="{{ $item->url_gambar }}" class="img-rounded img-thumbnail" alt="{{ $item->nama }}">
                        <div class="panel-body">
                            <h5 class="card-title"><strong> {{ $item->name }}</strong></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Quantity: {{ $q }}</li>
                                <li class="list-group-item">Price per pcs: <br>Rp. {{ $item->price }}</li>
                                <li class="list-group-item">Total: Rp. {{ $item->price * $q }}</li>
                            </ul>
                        </div>
                        <div class="panel-footer">

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
    </script>
@endsection
