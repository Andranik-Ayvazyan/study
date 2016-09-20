@extends('layouts.app')

@section('content')

     @foreach($product as $product)

        <a href = 'http://laratask/products/{{$product->id}}'>
        <div class="product_item">
                <div class="prod_img">
                    <img src="{{$product->image}}" alt="" width=200 height="120">
                </div>
                <hr>
                <h3><a href='http://laratask/products/{{$product->id}}'>{{$product->name}}</a></h3>
                <h3 class="item_price">{{$product->price}}</h3>
            </div>
        </a>

    @endforeach

@stop



