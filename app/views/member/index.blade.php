@extends('layouts.main')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="no-content col-xs-2 col-sm-2 cold-md-2"></div>

<div class="content col-xs-8 col-sm-8 col-md-8">
    <div class="well">
        @foreach ($movies as $movie)
        <div class="row">
            <div class="col-sm-12 col-md-4">
                {{ HTML::image('img/movies/' . $movie->image, null, ['class' => 'img-rounded img-responsive', 'height' => '300']) }}
                <?php $cinema_number = show_cinema_number($movie->id) ?>
                <h4>Cinema# {{ $cinema_number->cinema_id }}</h4>
            </div>

            <div class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h3 class="movie-title-single title">{{ $movie->title }}</h3>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <span><b>Sypnosis</b></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p class="text-justify">{{ $movie->description }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <span><b>Showing date:</b></span>
                    </div>
                    <div class="movie-details col-xs-8 col-sm-8 col-md-8">
                        <p>{{ date('F j, Y', strtotime($movie->showing_date)) }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <span><b>Show Times:</b></span>
                    </div>
                    <div class="movie-details col-xs-8 col-sm-8 col-md-8">
                        <?php $times = show_times($movie->id) ?>
                        @foreach ($times as $time)
                        <p>{{ date('h:i a', strtotime($time->start_time)) }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        {{ HTML::link('member/reserve/movie/' . $movie->id, 'reserve seat', ['class' => 'btn btn-primary btn-block']) }}
                    </div>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr class="member-movie-divider"/>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="no-content col-xs-2 col-sm-2 cold-md-2"></div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop