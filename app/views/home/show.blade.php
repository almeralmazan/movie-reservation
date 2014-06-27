@extends('layouts.main')

@section('content')
    {{ HTML::image('img/movies/' . $movie->image) }}
    <br/>
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    <p>Cinema: {{ $movie->cinema_id }}</p>
    <p>Showing Time: </p>
    <ul>
        @foreach ($movieTimes as $movie)
        <li>{{ $movie->start_time }}</li>
        @endforeach
    </ul>
@stop