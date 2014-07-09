@extends('layouts.admin')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('admin/dashboard/movie') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>
    <div class="row margin-top">
        <div class="col-md-8 col-md-offset-2">
            <div class="well well-lg">
                <div class="row">
                    <div class="col-md-8 text-uppercase">
                        <h1>Add movie</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="movie-title" class="col-sm-3 control-label">Movie title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="movie-title" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movie-banner" class="col-sm-3 control-label">Banner</label>
                                <div class="col-sm-8">
                                    <input type="file" id="movie-banner">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movie-description" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea name="" id="movie-description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movie-trailer" class="col-sm-3 control-label">Embed URL Trailer</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="movie-trailer" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-11 text-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="admin-home.html" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
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