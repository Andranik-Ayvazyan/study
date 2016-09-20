<?php

    namespace App\Http\Controllers;

    use App\Model\Product;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use Illuminate\Support\Facades\Mail;

    class UserController extends Controller
    {

        public function index ()
        {

            $products = Product::all();
            return view('user.user',['product'=>$products]);

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
