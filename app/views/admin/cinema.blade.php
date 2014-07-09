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
        <div class="col-md-12">
            <div class="well well-lg">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cinema-1">Cinema #</label>
                            <select name="" id="" class="form-control">
                                <option value="">Cinema 1</option>
                                <option value="">Cinema 2</option>
                                <option value="">Cinema 3</option>
                                <option value="">Cinema 4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-two">
                    <div class="col-md-2">
                        <div class="thumbnail admin-movies">
                            <img src="img/thumb1.jpg">
                            <div class="details" id="details-1" style="opacity : 1;">
                                <h4 class="margin-top-two">How to train your dragon 2</h4>
                                <p class="margin-top"><button href="#" class="btn btn-primary btn-sm" id="btn-get-movie-1">Select</button></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail admin-movies">
                            <img src="img/thumb2.jpg">
                            <div class="details" id="details-1">
                                <h4 class="margin-top-two">22 Jump street</h4>
                                <p class="margin-top"><button href="#" class="btn btn-primary btn-sm" id="btn-get-movie-2">Select</button></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail admin-movies">
                            <img src="img/thumb3.jpg">
                            <div class="details" id="">
                                <h4 class="margin-top-two">Edge of Tomorrow</h4>
                                <p class="margin-top"><button href="#" class="btn btn-primary btn-sm" id="btn-get-movie-3">Select</button></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail admin-movies">
                            <img src="img/thumb4.jpg">
                            <div class="details" id="">
                                <h4 class="margin-top-two">Blended</h4>
                                <p class="margin-top"><button href="#" class="btn btn-primary btn-sm" id="btn-get-movie">Select</button></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumbnail admin-movies">
                            <img src="img/thumb5.jpg">
                            <div class="details" id="">
                                <h4 class="margin-top-two">The Eschatrilogy</h4>
                                <p class="margin-top"><button href="#" class="btn btn-primary btn-sm" id="btn-get-movie">Select</button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <button class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('header')
    @include('layouts.partials.footer')
@stop
