@extends('layouts.main')

@section('content')

<div class="row">
    <div class="large-12 columns">
        {{ HTML::link('/', 'Back') }}
    </div>
</div>
<div class="row">
    <div class="large-8 medium-10 panel movie-details">
        <div class="row">
            <div class="large-4 medium-5 columns column-left">
                {{ HTML::image('img/movies/' . $movie->image) }}
            </div>
            <div class="large-8 medium-7 columns column-right">
                <h3>{{ $movie->title }}</h3>
                <hr/>
                <dl>
                    <dt>Sypnosis</dt>
                    <dd>{{ $movie->description }}</dd>
                </dl>
                <p>
                    <strong>Showing Date:</strong>
                    {{ date('F j, Y', strtotime($movie->showing_date)) }}
                </p>
                <p>
                    <strong>Cinema #:</strong>
                    {{ $movie->cinema_id }}
                </p>
                    <strong>Viewing Time:</strong>
                    <ul>
                        @foreach ($movieTimes as $movie)
                            <li>{{ date('g:i A', strtotime($movie->start_time)) }}</li>
                        @endforeach
                    </ul>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <hr>
</div>

@stop