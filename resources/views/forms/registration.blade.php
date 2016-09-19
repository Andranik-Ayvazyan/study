@extends('layout.layout')

@section('content')
    <div class = 'reg_form'>
        <form action="" method = 'post'>
            <label><input type="text" placeholder = 'Name'></label>
            <label><input type="text" placeholder = 'Last Name'></label>
            <label><input type="text" placeholder = 'Password'></label>
            <label><input type="text" placeholder = 'Confirm Password'></label>
            <label><input type="text" placeholder = 'Email'></label>
            <input type="submit" value = 'save'>
        </form>
    </div>
@stop