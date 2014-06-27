@extends('layouts.main')

@section('content')

<div class="row">
    <div class="large-7 columns">
        <span class="tagline">Discover new movies, grab the perfect schedule and stay updated with upcoming titles.</span>
    </div>
    <div class="large-5 columns">
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
                        <input type="text" placeholder="Email" />
                    </div>
                    <div class="large-12 columns">
                        <input type="text" placeholder="Password" />
                    </div>
                    <div class="large-12 columns">
                        <a href="#" class="button expand">Register</a>
                    </div>
                </div>
            </form>
        </div>
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
<!--                <img src="img/thumb1.jpg" alt="" width="185">-->
            </a>
            @endforeach
        </div>
    </div>
</div>

<!--    @foreach ($movies as $movie)-->
<!--        <li>{{ $movie->title }}</li>-->
<!--        <p>{{ HTML::image('img/movies/' . $movie->image) }}</p>-->
<!--    @endforeach-->
<div class="row">
    <hr>
</div>
@stop
