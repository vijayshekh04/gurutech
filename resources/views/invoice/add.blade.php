@extends('layouts.app')
@section('title',"Add Invoice")

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8" style="margin: 0 auto;">
                <h2>Add Invoice</h2>
                <form action="{{route('invoice.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   {{-- <input type="hidden" name="inventory_testing_length" class="inventory_testing_length">
                    <div class="form-group">
                        <label for="name">Item Name:</label>
                        <input type="text" class="form-control" id="item_name" placeholder="Enter Item Name" name="item_name" value="{{old('item_name')}}">
                        @if($errors->first('item_name'))
                            <label class="text-danger text-bold">{{$errors->first('item_name')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty:</label>
                        <input type="number" class="form-control" id="qty" placeholder="Enter Qty" name="qty" value="{{old('qty')}}">
                        @if($errors->first('qty'))
                            <label class="text-danger text-bold">{{$errors->first('qty')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{old('price')}}">
                        @if($errors->first('price'))
                            <label class="text-danger text-bold">{{$errors->first('price')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Amount:</label>
                        <input type="text" class="form-control" id="total_amount" placeholder="Enter Price" name="total_amount" value="{{old('total_amount')}}">
                        @if($errors->first('total_amount'))
                            <label class="text-danger text-bold">{{$errors->first('total_amount')}}</label>
                        @endif
                    </div>
                    <br>--}}
                    <div class="float-end">
                        <a href="javascript:void(0)" class="btn btn-primary add-more-btn">Add</a>
                    </div>
                    <div class="add-div">

                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary submit-btn" style="display: none">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="clone_div" style="display: none">
        <div class="item_new">
            <input type="hidden" name="item_length" class="item_length">
            <div class="form-group">
                <label for="name">Item Name:</label>
                <input type="text" class="form-control item-input-field" id="item_name" placeholder="Enter Item Name" name="item_name" value="{{old('item_name')}}" required>
            </div>
            <div class="form-group">
                <label for="qty">Qty:</label>
                <input type="number" class="form-control qty-input-field" id="qty" placeholder="Enter Qty" name="qty" value="{{old('qty')}}" required>

            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control price-input-field" id="price" placeholder="Enter Price" name="price" value="{{old('price')}}" required>

            </div>
            {{--<div class="form-group">
                <label for="total_amount">Total Amount:</label>
                <input type="text" class="form-control total-amount-input-field" id="total_amount" placeholder="Enter Price" name="total_amount" value="{{old('total_amount')}}">
            </div>--}}
        </div>
        <hr>
    </div>

    <script>
        function reset_error_label_id_item_counter(){
            // change name of item_name
            $('.add-div .item-input-field').each(function(key,value){
                $(value).attr('name','item_name_'+key);
            });

            $('.add-div .qty-input-field').each(function(key,value){
                $(value).attr('name','qty_'+key);
            });

            $('.add-div .price-input-field').each(function(key,value){
                $(value).attr('name','price_'+key);
            });

            $('.add-div .total-amount-input-field').each(function(key,value){
                $(value).attr('name','total_amount_'+key);
            });

            var length = $('.add-div .item-input-field').length;
            $('input[name=item_length]').val(length);
        }

        function calculate(qty,price)
        {
            return  parseFloat(qty) * parseFloat(price);
        }

        $(document).ready(function() {
            reset_error_label_id_item_counter();

            // add more  process start
            $(document).on('click','.add-more-btn',function () {
                $('.submit-btn').show();
                var html = $('.clone_div').children().clone();

                $('.add-div').append(html);
                reset_error_label_id_item_counter();
            });


        } );
    </script>
@endsection