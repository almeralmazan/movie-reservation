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
                    <div class="col-md-12">
                        <h2>
                            <small>Cinema #:</small> {{ $movie->cinema_id }}
                        </h2>

                        <h2>
                            <small>Selected Movie:</small> {{ $movie->title }}
                        </h2>
                    </div>
                    <div class="col-md-3">
                        <h5>
                            <strong>Movie</strong>
                        </h5>

                        <select class="form-control" id="movie">
                            <option> -- Select Movie -- </option>
                            <option>How To Train Your Dragon 2</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <h5>
                            <strong>Showing date:</strong>
                        </h5>

                        <div class="input-group date form_date col-md-3" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input name="date" class="form-control" size="16" type="text" value="{{ $movie->showing_date }}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>

                        <input type="hidden" id="dtp_input2" value="" />
                    </div>
                    <div class="col-md-12">
                        <h5><strong>Showtimes</strong></h5>
                        <table class="table table-bordered">
                            <tr>
                                @foreach ($times as $time)
                                <td>
                                    <input type="checkbox" id="{{ $time->id }}">
                                    <label for="{{ $time->id }}">{{ date('g:i a', strtotime($time->start_time)) }}</label>
                                </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-primary btn-block">Update</button>
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