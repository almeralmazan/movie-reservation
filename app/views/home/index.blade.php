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
                {{ Form::open(['url' => 'registration-form', 'id' => 'registration-form']) }}
                    <div class="row">
                        <div class="large-12 columns">
                            <span>Sign up:</span>
                            {{ Form::text('first_name', null, ['id' => 'first_name', 'placeholder' => 'First Name', 'required' => 'required']) }}
                        </div>
                        <div class="large-12 columns">
                            {{ Form::text('last_name', null, ['id' => 'last_name', 'placeholder' => 'Last Name', 'required' => 'required']) }}
                        </div>
                        <div class="large-12 columns">
                            {{ Form::text('mobile_number', null, ['id' => 'mobile_number', 'placeholder' => 'Mobile # - eg. 09199115188 ', 'required' => 'required']) }}
                        </div>
                        <div class="large-12 columns">
                            {{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Email', 'required' => 'required']) }}
                        </div>
                        <div class="large-12 columns">
                            {{ Form::password('password', ['id' => 'password', 'placeholder' => 'Password', 'required' => 'required']) }}
                        </div>
                        <div class="large-12 columns">
                            {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'placeholder' => 'Password Confirmation', 'required' => 'required']) }}
                        </div>
                        <div class="large-12 columns">
                            {{ Form::submit('Register', ['id' => 'register-button', 'class' => 'button expand']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
            <!-- Error alert -->
            <div id="registration-errors">
                <ul class="content"></ul>
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
