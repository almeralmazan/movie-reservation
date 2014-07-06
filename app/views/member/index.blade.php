@extends('layouts.main')


@section('header')
    <!--  Header  -->
    @include('layouts.partials.nav')

@stop

@section('content')
<div class="row">
    <div class="large-12 columns movie-showing-title">
        <h1>Movies Showing</h1>
    </div>
</div>
<div class="row">
    <div class="large-8 medium-11 panel movie-showing-container radius">
        @foreach ($movies as $movie)
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
                <!-- TODO -->
                {{ HTML::link('#', 'Reserve seat', ['class' => 'tiny radius button']) }}
            </div>
        </div>
        <hr class="divider">
        @endforeach

    </div>
</div>
<div class="row">
    <hr>
</div>
@stop

