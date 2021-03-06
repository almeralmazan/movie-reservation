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
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $trailer }}"></iframe>
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
                        {{ Form::open(['url' => 'member/register', 'id' => 'registration-form', 'role' => 'form']) }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" id="first_name" name="first_name" type="text">
                                    <span class="alert-danger" id="first-name-error"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" id="last_name" name="last_name" type="text">
                                    <span class="alert-danger" id="last-name-error"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="email" name="email" type="email">
                                    <span class="alert-danger" id="email-error"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mobile # 09159229239" id="mobile_number" name="mobile_number" type="text">
                                    <span class="alert-danger" id="mobile-number-error"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                                    <span class="alert-danger" id="password-error"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password Confirmation" id="password_confirmation" name="password_confirmation" type="password">
                                    <span class="alert-danger" id="password-confirmation-error"></span>
                                </div>
                                <input class="btn btn-primary btn-block" type="submit" value="Sign up">
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>

                <div class="row">
                    <div id="registration-success" role="alert"></div>
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
                        <p class="text-center">
                            <a href="{{ URL::to('public/movie', $movie->id) }}" rel="tooltip" title="Showtimes">
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
@stop

@section('footer')
    <!--  Footer  -->
    @include('layouts/partials/footer')
@stop
