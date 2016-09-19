@extends('layouts.admin')

@section('content')

  <div class="">
     <div class="clearfix"></div>
         <div class="row">
             <div class="product_img"></div>
             <div class="product_name">
               <h3>Name: {{ $product->name }}</h3>
               <h3>Price: {{$product->price}}</h3>
               <h3>Quantity: {{$product->price}}</h3>
             </div>
         </div>
         <div class="row">
           <p class="show_description">{{$product->description}}</p>
         </div>
     </div>
  </div>

@stop
