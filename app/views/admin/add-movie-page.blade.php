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

    @if (Session::has('message'))
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        </div>
    </div>
    @endif

    <div class="row margin-top-two">
        <div class="col-md-8 col-md-offset-2">
            <div class="well well-lg">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Add Movie</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Form::open(['url' => 'admin/dashboard/add-movie', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true]) }}
                            <div class="form-group">
                                <label for="movie-title" class="col-sm-3 control-label">Movie Title</label>
                                <div class="col-sm-8">
                                    <input name="movie_title" type="text" class="form-control" id="movie-title" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movie-banner" class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-8">
                                    {{ Form::file('image', ['id' => 'movie-banner', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movie-description" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea name="movie_description" id="movie-description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="movie-trailer" class="col-sm-3 control-label">Embed URL Trailer</label>
                                <div class="col-sm-8">
                                    <input name="trailer_url" type="text" class="form-control" id="movie-trailer" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-11 text-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ URL::to('admin/dashboard/movie') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        {{ Form::close() }}
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