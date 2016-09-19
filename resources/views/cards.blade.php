@extends('layouts.app')

@section('content')

@foreach($cards as $card)

    <p><a href = "cards/{{$card->id}}">{{$card->name}}</a></p>

@endforeach


@endsection
