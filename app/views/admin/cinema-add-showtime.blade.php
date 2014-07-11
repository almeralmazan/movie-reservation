@extends('layouts.admin')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('admin/dashboard/cinema') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>
    <div class="row margin-top-two">
        <div class="col-md-6 col-md-offset-3">
            <div class="well">
                <div class="row">
                    <div class="col-md-12">
                        <h2><small>Cinema #:</small> 1</h2>
                        <h2><small>Movie title:</small> How to train your dragon 2</h2>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <p class="lead">
                            Starting showtime : 10:00 AM
                        </p>
                    </div>
                </div>
                <div class="row" id="showtime-container">
                </div>
                <div class="row margin-top-two">
                    <div class="col-md-6">
                        <button class="btn btn-primary" id="add-showtime">Add showtime</button>
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