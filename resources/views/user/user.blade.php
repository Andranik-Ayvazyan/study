@extends('layouts.app')


@section('content')

    @foreach($product as $product)

        <div class="'product_item">

            {{$product->name}}

        </div>

    @endforeach

@stop



