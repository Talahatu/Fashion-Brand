@extends('layouts.index')

@section('content')

    @if (isset($carts) && count($carts) > 0)
        @php
            $total = 0;
        @endphp
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($carts as $key => $cart)
                    @php
                        $item = $cart['product'];
                        $q = $cart['quantity'];
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
                                    @php
                                        $total += $item->price * $q;
                                    @endphp
                                </ul>
                            </div>
                            <div class="panel-footer">

                                <a href="{{ route('additem', ['id' => $item->id, 'value' => 'add']) }}"
                                    class="btn btn-primary btn-block">+</a>
                                <a href="{{ route('additem', ['id' => $item->id, 'value' => 'subtract']) }}"
                                    class="btn btn-primary btn-block">-</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @php
                $discs = session()->get('discounts');
                $totalAll = 0;
                $totalDisc = 0;
            @endphp
            @if (isset($discs["nominal"]))
                <h1>Total Awal: Rp. {{ $total }}</h1>
                <h1>Diskon: {{$discs["name"]}} - {{$discs["nominal"] * 100}}% (Hemat: Rp. {{$total * $discs["nominal"]}})</h1>
                @php
                    $totalDisc += ($total * $discs["nominal"]);
                @endphp
            @else
                @php

                @endphp
            @endif

            @if (isset($discs["poin"]) && $discs["poin"] > 0 )
                @php
                    $totalDisc += 10000 * $discs["poin"];
                    $totalAll = ($total - $totalDisc) * 1.11;
                    if ($totalAll <= 0) {
                        $totalAll = 0;
                    }
                @endphp
                <h1>Total Semua: Rp. {{ $totalAll }} (Termasuk pajak 11%) (Menggunakan poin)</h1>
            @else
                @php
                    $totalAll = ($total - $totalDisc) * 1.11;
                    if ($totalAll <= 0) {
                        $totalAll = 0;
                    }
                @endphp
                <h1>Total Semua: Rp. {{ $totalAll }} (Termasuk pajak 11%)</h1>
            @endif
            <br>
            <h4>Masukkan kode voucher</h4>
            <form action="{{ route('applydiscount') }}" method="POST">
                @csrf
                {{-- <input type="hidden" name="total" value="{{$total}}"> --}}
                <label for="kode">Kode:</label>
                <input type="text" name="kode" id="kode">
                {{-- name="kode" will be submitted to the server --}}

                <!-- Add more form fields as needed -->

                <button type="submit">Submit</button>
            </form>
            <br>
            <form action="{{ route('applypoint') }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="use">
                <input type="hidden" name="total" value="{{$total}}">
                <button type="submit"  class="btn btn-primary">Gunakan Poin</button>
                <p>Poin Anda: {{Auth::user()->poin}}<br>Per poin seharga Rp. 10000<br>Poin hanya dapat digunakan jika total awal lebih dari Rp. 100000</p>
            </form>
            <br>
            <form action="{{ route('applypoint') }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="cancel">
                <button type="submit"  class="btn btn-danger">Batal Gunakan Poin</button>
            </form>

            <br><br><br>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-block" style="font-size:4ch; padding-top:20px; padding-bottom:20px">Checkout Belanja</button>
            </form>
        </div>
    @else
        <h1>TIDAK ADA ITEM<br>HARAP TARUH ITEM KE KERANJANG</h1>
    @endif
@endsection


@section('script')
    {{-- janky AF -mt --}}
    {{-- I stole this cursed script from category.blade.php, wtf man -kd --}}
    <script>
        $(".active").removeClass("active");
        console.log(
            $('a span:contains("Keranjang")').parent().parent().addClass("active"))

        $("a").on("click", function() {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    </script>
@endsection

{{-- @section('script')
    <script>
        $("a").on("click", function() {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    </script>

@endsection --}}
