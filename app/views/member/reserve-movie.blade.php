@extends('layouts.main')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('/member') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>

    <div class="row margin-top">
        <div class="content col-md-3">
            <div class="well">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="movie-title-single title">{{ $movie->title }}</h2>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
<!--                        <img src="img/thumb3.jpg" alt="" class="img-rounded img-responsive" height="300">-->
                        {{ HTML::image('img/movies/' . $movie->image, null, ['class' => 'img-rounded img-responsive', 'height' => '300']) }}
                    </div>

                    <div class="col-md-12">
                        <div class="row margin-top-two">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <span><b>Sypnosis</b></span>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p class="text-justify">After making their way through high school (twice), big changes are in store for officers Schmidt and Jenko when they go deep undercover at a local college. (from IMDb)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-5">
                                <span><b>Showing date:</b></span>
                            </div>

                            <div class="movie-details col-xs-8 col-sm-8 col-md-7">
                                <p>July 7, 2014</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="well">
                <div class="row margin-top-two">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Show times</label>

                                <div class="col-sm-6">
                                    <select name="show_start_time" id="show-start-time" class="form-control">
                                    @foreach ($times as $time)
                                        <option value="">{{ $time->start_time }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row margin-top-two">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-info" role="alert">
                            <h1 class="text-center text-uppercase">screen</h1>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-1"><!-- palaman --></div>
                    <div class="col-md-1">
                        <button class="btn-seats btn btn-danger btn-block">01</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">02</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">03</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-danger btn-block">04</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">05</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-danger btn-block">06</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">07</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">08</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">09</button>
                    </div>

                    <div class="col-md-1">
                        <button class="btn-seats btn btn-default btn-block">10</button>
                    </div>

                    <div class="col-md-1"><!-- palaman --></div>
                </div>

                <div class="row margin-top-two">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="" class="btn btn-primary btn-lg btn-block">
                            reserve
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop