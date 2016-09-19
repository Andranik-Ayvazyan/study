@extends('layouts.app')

@section('content')

    <h1>{{$card->name}}</h1>
    <ul>
        @foreach($card->notes as $note)
              <li>{{$note->title}}</li>
        @endforeach
    </ul>
@endsection
