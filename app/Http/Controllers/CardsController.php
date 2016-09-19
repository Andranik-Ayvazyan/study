<?php

namespace App\Http\Controllers;

use App\Cards;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Cards::all();

        return view('cards',compact('cards'));
    }

    public function show(Cards $card)
    {


        return view('cardsShow',compact('card'));
    }
}
