@extends('layouts.main')

@section('content')
    <h1>Movie Reservation</h1>

    {{ Form::open(['url' => 'member/login']) }}
    {{ Form::text('email', null, ['placeholder' => 'Email']) }}
    {{ Form::password('password', ['placeholder' => 'Password']) }}
    {{ Form::submit('Login', ['class' => 'button']) }}
    {{ Form::close() }}
@stop