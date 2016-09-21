@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="panel panel-info product_panel">
            <div class="panel-heading">
                <h3 class="panel-title">Products list<p class="toggle_prod_table"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></p></h3>
            </div>
              <div class="p_content">
                <div class="panel-body">

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


                </div>
                <div class="panel-footer">

                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                </div>
          </div>
        </div>
    </div>

@stop



