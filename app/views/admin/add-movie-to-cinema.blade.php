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
        <div class="col-md-12">
            <div class="well" ng-controller="CinemaController">
                <div class="row">

                {{ Form::open(['url' => 'admin/dashboard/update/add-movie-to-cinema']) }}
                    <div class="col-md-12">
                        <h2>
                            <small>Cinema #:</small> {{ $cinemaIdContent }}
                        </h2>

                        <div class="form-group col-md-5" style="margin-left: -15px">
                            <h2>
                                <small>Select Movie:</small>
                                {{ Form::select('movie_id', $movies, '', ['class' => 'form-control']) }}
                            </h2>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h5>
                            <strong>Showing date:</strong>
                        </h5>

                        <div class="input-group date form_date col-md-3" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input name="movie_showing_date" class="form-control" size="16" type="text" value="{{ $movie->showing_date }}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>

                        <input type="hidden" name="cinema_id" id="cinema-id" value="{{ $cinema_id }}" />
                    </div>
                    <div class="col-md-12">
                        <h5><strong>Showtimes</strong></h5>
                        <table class="table table-bordered">
                            <tr>
                                @foreach ($times as $time)
                                <td>
                                    <input type="checkbox" name="time_{{ $time->id }}" id="{{ $time->id }}">
                                    <label for="{{ $time->id }}">{{ date('g:i a', strtotime($time->start_time)) }}</label>
                                </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@section('footer')
@include('layouts.partials.footer')
@stop