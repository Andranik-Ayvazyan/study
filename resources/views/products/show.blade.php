@extends('layouts.admin')

@section('content')

  <div class="">
     <div class="clearfix"></div>
         <div class="row">
             <div class="product_img"><img src = 'http://pisces.bbystatic.com//BestBuy_US/store/ee/2015/com/pm/nav_desktops_1115.jpg;maxHeight=288;maxWidth=520'/></div>
             <div class="product_name">
               <h3>Name: {{ $product->name }}</h3>
               <h3>Quantity: {{$product->price}}</h3>
               <h3 class="show_price">Price: {{$product->price}}</h3>
             </div>
         </div>
         <div class="row">
           <fieldset >
               <legend>Description: </legend>
               {{$product->description}}
           </fieldset>
         </div>
     </div>
  </div>

@stop
