@extends('layouts.main')

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('member') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Past Transactions</h1>
            <hr>
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <th>Receipt #</th>
                <th>Date Bought</th>
                <th>Movie watched</th>
                <th>Showtime</th>
                <th>Tickets bought</th>
                <th>Burger</th>
                <th>Fries</th>
                <th>Soda</th>
                <th>Total</th>
                <th>Status</th>
                </thead>
                <tbody>
                <tr>
                    <td>A123SDF34-001</td>
                    <td>August 3, 2014</td>
                    <td>How to Train Your Pussy 2</td>
                    <td>July 6, 2014</td>
                    <td>1</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>3</td>
                    <td>
                        <span class="label label-success">Paid</span>
                    </td>
                </tr>
                <tr>
                    <td>A123SDF34-001</td>
                    <td>August 3, 2014</td>
                    <td>almer@gmail.com</td>
                    <td>09353234567</td>
                    <td>KoniChiwa</td>
                    <td>July 2, 2014</td>
                    <td>1</td>
                    <td>3</td>
                    <td>3</td>
                    <td>
                        <span class="label label-primary">Reserved</span>
                        <a href="">Pay Online</a>
                    </td>
                </tr>
                <tr>
                    <td>A123SDF34-001</td>
                    <td>August 3, 2014</td>
                    <td>almer@gmail.com</td>
                    <td>09353234567</td>
                    <td>KoniChiwa</td>
                    <td>July 2, 2014</td>
                    <td>1</td>
                    <td>3</td>
                    <td>3</td>
                    <td>
                        <span class="label label-danger">Expired</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop