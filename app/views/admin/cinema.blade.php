@extends('layouts.admin')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>

    <div class="row margin-top-two">

        @foreach ($cinemas as $cinema)
        <div class="col-md-2 margin-top-two">
            <div class="well" style="height: 150px;">
                <h4><strong>Cinema {{ $cinema->id }}</strong></h4>

                <?php $movie = show_movie_title($cinema->id) ?>
                <h5>
                    {{ $movie->title }}
<!--                    <a href="{{ URL::to('admin/dashboard/remove/movie', [$cinema->id]) }}" class="btn btn-xs btn-danger">-->
<!--                        <span class="glyphicon glyphicon-remove"></span>-->
<!--                    </a>-->
                </h5>


                <a href="{{ URL::to('admin/dashboard/manage-showtime', [$cinema->id]) }}" class="btn btn-sm btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span> Manage Cinema
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@stop

@section('header')
    @include('layouts.partials.footer')
@stop
