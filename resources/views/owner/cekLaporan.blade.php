@extends('layouts.index')
@section('content')
<h1>Transaction Report</h1>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <br>
    <table class="table ">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total</th>
                <th scope="col">Buyer ID</th>
                <th scope="col">Buyer Name</th>
                <th scope="col">Buyer Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $notes)
                <tr>
                    <th scope="row">{{ $notes->noteid }}</th>
                    <td class="editable" id="td_name_{{ $notes->id }}">{{ $notes->order_date }}</td>
                    <td class="editable" id="td_email_{{ $notes->id }}">{{ $notes->total }}</td>
                    <td class="editable" id="td_email_{{ $notes->id }}">{{ $notes->Pembeli_id}}</td>
                    <td class="editable" id="td_email_{{ $notes->id }}">{{ $notes->name}}</td>
                    <td class="editable" id="td_email_{{ $notes->id }}">{{ $notes->email}}</td>
                    <td class="editable" id="td_email_{{ $notes->id }}">{{ $notes->created_at }}</td>
                    <td class="editable" id="td_email_{{ $notes->id }}">{{ $notes->updated_at }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
