@extends('layouts.main')

@section('header')
    <!--  Header  -->
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('/') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
<!--                <img src="img/back.png" alt="">-->
            </a>
        </div>
    </div>
    <div class="row margin-top">
        <div class="no-content col-xs-2 col-sm-2 col-md-2">
            <!-- walang laman -->
        </div>
        <div class="content col-xs-8 col-sm-8 col-md-8">
            <div class="well">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        {{ HTML::image('img/movies/' . $movie->image, null, ['class' => 'img-rounded img-responsive', 'height' => '300']) }}
<!--                        <img src="img/thumb3.jpg" alt="" class="img-rounded img-responsive" height="300">-->
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <h2 class="movie-title-single title">{{ $movie->title }}</h2>
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
                                <span><b>Showtimes:</b></span>
                            </div>
                            <div class="movie-details col-xs-8 col-sm-8 col-md-8">
                                <ul class="list-unstyled">
                                @foreach ($movieTimes as $mt)
                                    <li>{{ date('H:i a', strtotime($mt->start_time)) }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <a href="" class="btn btn-primary btn-block">reserve seat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="no-content col-xs-2 col-sm-2 col-md-2">
        <!-- walang laman -->
    </div>
</div>
</div>
@stop


@section('footer')
    <!--  Footer  -->
    @include('layouts/partials/footer')
@stop
