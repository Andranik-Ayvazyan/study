<?php

    namespace App\Http\Controllers;

    use App\Model\Product;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use Illuminate\Support\Facades\Mail;

    class UserController extends Controller
    {

        public function index (Request $request)
        {

            if($request->ajax()) {

                $productsAll = Product::all();
                $total = count($productsAll);

                if($request->page == 0 || $request->page == 1) {

                    $rowItem = 0;

                } else {

                    $rowItem = ($request->page*4)-4;
                }


                $products = Product::offset($rowItem )->limit(4)->get();

                return response()->json(['products'=>$products,'total'=>$total]);

            } else {

                $products = Product::all();
                return view('user.user',['product'=>$products]);
            }

        }
        
        
        public function sendMail ()
        {

            Mail::send('emails.confirm', [], function($m){

                $m->from('andranik-ayvazyan@mail.ru','confirm your account');

                $m->to('andranik-ayvazyan@mail.ru','Andranik')->subject('verify link');

            });
            
            return back();
        }

    }
