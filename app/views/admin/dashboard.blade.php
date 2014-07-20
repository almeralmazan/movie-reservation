@extends('layouts.admin')

@section('header')
    @include('layouts.partials.nav')
@stop


@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-7 home-link-container">
                    <a href="{{ URL::to('admin/dashboard/movie') }}" class="btn btn-primary btn-lg btn-block">
                        <span class="glyphicon glyphicon-play-circle center-block icon"></span>
                        <span class="center-block">Movies</span>
                    </a>
                </div>
                <div class="col-md-5 home-link-container">
                    <a href="{{ URL::to('admin/dashboard/cinema') }}" class="btn btn-success btn-lg btn-block">
                        <span class="glyphicon glyphicon-film center-block icon"></span>
                        <span class="center-block">Cinema</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 home-link-container">
                    <a href="{{ URL::to('admin/dashboard/seat') }}" class="btn btn-warning btn-lg btn-block">
                        <span class="glyphicon glyphicon-th center-block icon"></span>
                        <span class="center-block">Seats</span>
                    </a>
                </div>
                <div class="col-md-8 home-link-container">
                    <a href="{{ URL::to('admin/dashboard/member') }}" class="btn btn-danger btn-lg btn-block">
                        <span class="glyphicon glyphicon-user center-block icon"></span>
                        <span class="center-block">Members</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 home-link-container">
                    <a href="{{ URL::to('admin/dashboard/transaction') }}" class="btn btn-info btn-lg btn-block">
                        <span class="glyphicon glyphicon-credit-card center-block icon"></span>
                        <span class="center-block">Transactions</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop
