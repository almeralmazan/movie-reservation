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
                        <h2><small>Cinema #:</small> {{ $movie->cinema_id }}</h2>
                        <h2><small>Movie title:</small> {{ $movie->title }}</h2>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <p class="lead">
                            Starting showtime : 10:00 AM
                        </p>
                    </div>
                </div>
                <div class="row" id="showtime-container" ng-controller="CinemaController">
                    <div ng-repeat="Select in select_box" class="select-showtime col-md-12 margin-top-two">
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-control">
                                    <option value="">12:00 PM</option>
                                    <option value="">2:00 PM</option>
                                    <option value="">4:00 PM</option>
                                    <option value="">6:00 PM</option>
                                    <option value="">8:00 PM</option>
                                    <option value="">10:00 PM</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button id="remove-showtime" class="btn btn-default" ng-click="closeSelect($index)">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-3 margin-top-two">
                        <button class='btn btn-success btn-block' ng-click="addSelect()">Add Select</button>
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