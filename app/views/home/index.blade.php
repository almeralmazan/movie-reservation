@extends('layouts.main')


@section('header')
    <!--  Header  -->
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/r8HPIH5JCak"></iframe>
                </div>
            </div>
            <br class="hidden-md hidden-lg">
            <br class="hidden-md hidden-lg">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign up</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password_confirmation" type="password" value="">
                                </div>
                                <input class="btn btn-primary btn-block" type="submit" value="Sign up">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="title">Now showing</h1>
            <hr>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <center>

                @foreach ($movies as $movie)
                <div class="thumbnail movie-thumbnail">
                    {{ HTML::image('img/movies/' . $movie->image) }}
                    <div class="caption">
                        <h4><a href="">{{ $movie->title }}</h4>
                        <p>{{ Str::limit($movie->description, $limit = 150, $end = '...') }}</p>
                        <p>
                            <a data-toggle="modal" href="#myModal" rel="tooltip" title="Play trailer">
                            <span class="glyphicon glyphicon-play-circle"></span>
                            </a>
                            <a href="#" rel="tooltip" title="Showtimes">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </a>
                        </p>
                    </div>
                </div>
                @endforeach

            </center>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr class="divider-before-footer">
        </div>
    </div>
</div>
@stop

@section('footer')
    <!--  Footer  -->
    @include('layouts/partials/footer')
@stop