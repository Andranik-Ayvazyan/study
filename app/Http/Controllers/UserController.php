<?php

    namespace App\Http\Controllers;

    use App\Model\Product;
    use Illuminate\Http\Request;

    use App\Http\Requests;

    class UserController extends Controller
    {

        public function index ()
        {

            $products = Product::all();
            return view('user.user',['product'=>$products]);

        }

    }
