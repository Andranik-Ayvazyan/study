@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="panel panel-info product-panel" data-plugin="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Products list
                        <a class="collapse-link" data-toggle="panel.toggle"><i class="fa  fa-chevron-down"></i></a>
                </h3>
            </div>
              <div class="panel-content">
                <div class="panel-body">

                </div>
                <div class="panel-footer">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">

                            </ul>
                        </nav>
                </div>
          </div>
        </div>
    </div>
                   {{--@foreach($product as $product)--}}

        {{--<a href = 'http://laratask/products/{{$product->id}}'>--}}
                            {{--<div class="product_item">--}}
                                {{--<div class="prod_img">--}}
                                    {{--<img src="{{$product->image}}" alt="" width=200 height="120">--}}
                                {{--</div>--}}
                                {{--<hr>--}}
                                {{--<h3><a href='http://laratask/products/{{$product->id}}'>{{$product->name}}</a></h3>--}}
                                {{--<h3 class="item_price">{{$product->price}}</h3>--}}
                            {{--</div>--}}
                        {{--</a>--}}

                    {{--@endforeach--}}
@stop



