@extends('layouts.main')

@section('content')
    <h1>Movie Reservation</h1>

    {{ Form::open(['url' => 'member/login']) }}
    {{ Form::text('email', null, ['placeholder' => 'Email']) }}
    {{ Form::password('password', ['placeholder' => 'Password']) }}
    {{ Form::submit('Login', ['class' => 'button']) }}
    {{ Form::close() }}

    <div class="row">
    @foreach ($movies as $movie)
        <li>{{ $movie->title }}</li>
        <p>{{ HTML::image('img/movies/' . $movie->image) }}</p>
    @endforeach
    </div>
@stop