@extends('layouts.index')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Order Date</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($note as $data1)
                    @foreach ($data1['details_data'] as $data2)
                        <tr>
                            <td>{{ $data2['products']->name }}</td>
                            <td>{{ $data2['details']->quantity }}</td>
                            <td>{{ $data1['note_data']->order_date }}</td>
                            <td>Rp. {{ $data2['details']->subTotal }}</td>
                        </tr>
                    @endforeach
                    <tr class="success">
                        <td></td>
                        <td></td>
                        <td>Total: </td>
                        <td>Rp. {{ $data1['note_data']->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
