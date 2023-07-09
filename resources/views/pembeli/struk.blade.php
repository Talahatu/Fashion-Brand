@extends('layouts.index')

@section('content')
    <style>
        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }

        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 60em;
            background: #FFF;
        }

        #invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoice-POS h2 {
            font-size: 3em;
        }

        #invoice-POS h3 {
            font-size: 2em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            font-size: 2em
            color: #666;
            line-height: 1.2em;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS #top {
            min-height: 100px;
        }

        #invoice-POS #mid {
            min-height: 80px;
        }

        #invoice-POS #bot {
            min-height: 50px;
        }

        #invoice-POS #top .logo {
            height: 40px;
            width: 150px;
            background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat;
            background-size: 150px 40px;
        }

        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;

        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            font-size: .5em;
            background: #EEE;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS .item {
            width: 24mm;
        }

        #invoice-POS .itemtext {
            font-size: 1.25em;
        }

        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }
    </style>

    <p>Jika perlu silahkan screenshot invoice dibawah</p>
    <div id="invoice-POS">

        <center id="top">
            {{-- <div class="logo"></div> --}}
            <div class="info">
                <h2>Fashion Brand by Orang Sibuk</h2>
            </div>
            <!--End Info-->
        </center>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <h2>Info Kontak</h2>
                <p>
                    Alamat : Surabaya RUNGKUT</br>
                    Email : xxxx@mail.com</br>
                    Telephone : 08569420xxxx</br>
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Item</h2>
                        </td>
                        <td class="Hours">
                            <h2>Qty</h2>
                        </td>
                        <td class="Rate">
                            <h2>Sub Total</h2>
                        </td>
                    </tr>

                    @foreach ($struk as $item)
                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext">{{$item['name']}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{$item['quantity']}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">Rp. {{$item['subtotal']}}</p>
                        </td>
                    </tr>
                    @endforeach




                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total keseluruhan</h2>
                        </td>
                        <td class="payment">
                            <h2>Rp. {{($total - $totalDisc) * 1.11}}</h2>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total sebelum PPN (11%)</h2>
                        </td>
                        <td class="payment">
                            <h2>Rp. {{$total - $totalDisc}}</h2>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Potongan harga</h2>
                        </td>
                        <td class="payment">
                            <h2>Rp. {{$totalDisc}}</h2>
                        </td>
                    </tr>


                </table>
            </div>
            <!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Terimakasih Telah Berbelanja!</strong> Barang yang sudah dibeli tidak dapat
                    dikembalikan. Jangan lupa berkunjung kembali
                </p>
            </div>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->
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
