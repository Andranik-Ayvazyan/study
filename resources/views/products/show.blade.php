@extends('layouts.app')

@section('content')

   <div class="show_content">
     <div class="row">
         <div class="product_img"><img src = '{{ $product->image }}' width=500 height="300"/></div>
         <div class="product_name">
           <h3>Name: <span class="text-primary"><i>{{ $product->name }}</i></span></h3>
           <h3>Quantity: <span class="text-primary"><i>{{$product->price}}</i></span></h3>
           <h3 class="show_price">Price: {{$product->price}}</h3>
         </div>
     </div>
     <div class="row">
       <fieldset class ='show_description' >
           <legend>Description</legend>
           {{$product->description}}
       </fieldset>
     </div>
 </div>
@stop
