@extends('layouts.app')
@section('title',"Invoice")

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="float-end">
                <a href="{{route('invoice.create')}}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <table class="table table-striped" id="datatable">
            <thead>
            <tr>
                <th>Invoice No</th>
                <th>Total Items</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($invoices as $row)
                    <tr>
                        <th>{{$row->id}}</th>
                        <th>{{$row->total_items}}</th>
                        <th>
                            <a href="{{url('item-view/'.$row->id)}}">view</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection