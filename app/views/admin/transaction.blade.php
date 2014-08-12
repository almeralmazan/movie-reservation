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
            <input type="text" class="form-control" placeholder="Search...." ng-model="search_transaction">
        </div>
        <div class="col-xs-3">
            <select class="form-control" ng-model="ps.paid_status">
                <option value="">-- Select Payment Status --</option>
                <option value="1">Paid</option>
                <option value="0">Not Paid</option>
            </select>
        </div>
        <div class="col-md-12 margin-top-two" ng-controller="AdminTransactionController">
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>Receipt #</th>
                    <th>Name</th>
                    <th>Contact #</th>
                    <th>Movie Watched</th>
                    <th>Date</th>
                    <th>Showtime</th>
                    <th>Tickets</th>
                    <th>Burger</th>
                    <th>Fries</th>
                    <th>Soda</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    <tr ng-repeat="transaction in transactions | filter:search_transaction | filter:ps">
                        <td>{[ transaction.receipt_number ]}</td>
                        <td>{[ transaction.customer_name ]}</td>
                        <td>{[ transaction.mobile_number ]}</td>
                        <td>{[ transaction.movie_title ]}</td>
                        <td>{[ transaction.created_at | date:'longDate' ]}</td>
                        <td>{[ transaction.start_time ]}</td>
                        <td>{[ transaction.tickets_bought ]}</td>
                        <td>{[ transaction.burger_bought ]}</td>
                        <td>{[ transaction.fries_bought ]}</td>
                        <td>{[ transaction.soda_bought ]}</td>
                        <td>{[ transaction.total ]}</td>

                        <td>
                            <span class="label label-success" ng-show="transaction.paid_status">
                                Paid
                            </span>
                            <span class="label label-warning" ng-hide="transaction.paid_status">
                                Not Paid
                            </span>
                        </td>
                        <td>
                            <a href="" class="btn btn-xs btn-primary" ng-show="transaction.paid_status == 0">
                                Pay now
                            </a>
                            <a href="" class="btn btn-xs btn-danger" ng-show="transaction.paid_status == 0">
                                Cancel
                            </a>
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
