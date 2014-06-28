@extends('layouts.main')

@section('content')
<div class="row alert-container">
    <!-- Error alert -->
    <div id="error-message"></div>
    <!-- end of Error alert -->
</div>
<div class="content">
    <div class="row">
        <div class="large-7 medium-7 columns">
            <span class="tagline">Discover new movies, grab the perfect schedule and stay updated with upcoming titles.</span>
        </div>
        <div class="large-5 medium-5 columns">
            <div class="panel">
                <form>
                    <div class="row">
                        <div class="large-12 columns">
                            <span>Sign up:</span>
                            <input type="text" placeholder="First Name" />
                        </div>
                        <div class="large-12 columns">
                            <input type="text" placeholder="Last Name" />
                        </div>
                        <div class="large-12 columns">
                            <input type="text" placeholder="Mobile #" />
                        </div>
                        <div class="large-12 columns">
                            <input type="email" placeholder="Email" />
                        </div>
                        <div class="large-12 columns">
                            <input type="password" placeholder="Password" />
                        </div>
                        <div class="large-12 columns">
                            <a href="#" class="button expand">Register</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Error alert -->
            <div class="alert-box alert error-sign-in">
                <ul>
                    <li>error 1</li>
                    <li>error 2</li>
                    <li>error 3</li>
                    <li>error 4</li>
                    <li>error 5</li>
                </ul>
            </div>
            <!-- end of Error alert -->
        </div>
    </div>
<div class="row">
    <hr>
</div>
<div class="row">
    <div class="row">
        <div class="large-12 columns movie-slider-container">
            @foreach ($movies as $movie)
            <a href="{{ URL::to('public/movie/' . $movie->id) }}">
                {{ HTML::image('img/movies/' . $movie->image, null, ['width' => '185']) }}
            </a>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <hr>
</div>
@stop
