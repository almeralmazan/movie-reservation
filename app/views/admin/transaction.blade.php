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
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search....">
        </div>
        <div class="col-xs-2">
            <select name="" id="" class="form-control">
                <option value="">paid</option>
                <option value="">not paid</option>
            </select>
        </div>
        <div class="col-md-12 margin-top-two">
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>Receipt #</th>
                    <th>Name</th>
                    <th>Movie Watched</th>
                    <th>Showtime</th>
                    <th>Tickets Bought</th>
                    <th>Burger</th>
                    <th>Fries</th>
                    <th>Soda</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>ayi</td>
                        <td>How To Train Your Dragon 2</td>
                        <td>July 6, 2014</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>500</td>
                        <td>
                            <span class="label label-success">Paid</span>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>almer</td>
                        <td>Noah</td>
                        <td>July 2, 2014</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>450</td>
                        <td>
                            <span class="label label-warning">Not paid</span>
                        </td>
                        <td>
                            <a href="" class="btn btn-xs btn-primary">Pay now</a>
                            <a href="" class="btn btn-xs btn-danger">Cancel</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop
