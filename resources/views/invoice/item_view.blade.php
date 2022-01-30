@extends('layouts.app')
@section('title',"Invoice")

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="float-end">
                <a href="{{route('invoice.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <table class="table table-striped" id="datatable">
            <thead>
            <tr>
                <th>Invoice No</th>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoicItems as $row)
                <tr>
                    <th>{{$row->invoice_id}}</th>
                    <th>{{$row->name}}</th>
                    <th>{{$row->qty}}</th>
                    <th>{{$row->price}}</th>
                    <th>{{$row->total_amount}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection