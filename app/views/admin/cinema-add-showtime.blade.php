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
                    <div class="col-md-5">
                        <h2><small>Cinema #:</small> {{ $movie->cinema_id }}</h2>
                        <h2><small>Selected Movie:</small> {{ $movie->title }}</h2>
                        <h5><strong>Movie</strong></h5>
                        <select class="form-control" id="movie">
                            <option> -- Select Movie -- </option>
                        </select>
                        <h5><strong>Showing date:</strong></h5>
                        <div class="input-group date form_date col-md-12" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input name="date" class="form-control" size="16" type="text" value="2014-06-30" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" value="" />
                    </div>
                    <div class="col-md-12">
                        <h5><strong>Showtimes</strong></h5>
                        <table class="table table-bordered">
                            <tr>
                                <td> <input type="checkbox" id="10"><label for="10"></label> 10:00 AM</td>
                                <td> <input type="checkbox" id="11"><label for="11"></label> 11:00 AM</td>
                                <td> <input type="checkbox" id="12"><label for="12"></label> 12:00 PM</td>
                                <td> <input type="checkbox" id="1"><label for="1"></label> 1:00 PM</td>
                                <td> <input type="checkbox" id="2"><label for="2"></label> 2:00 PM</td>
                                <td> <input type="checkbox" id="3"><label for="3"></label> 3:00 PM</td>
                                <td> <input type="checkbox" id="4"><label for="4"></label> 4:00 PM</td>
                                <td> <input type="checkbox" id="5"><label for="5"></label> 5:00 PM</td>
                                <td> <input type="checkbox" id="6"><label for="6"></label> 6:00 PM</td>
                                <td> <input type="checkbox" id="7"><label for="7"></label> 7:00 PM</td>
                                <td> <input type="checkbox" id="8"><label for="8"></label> 8:00 PM</td>
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