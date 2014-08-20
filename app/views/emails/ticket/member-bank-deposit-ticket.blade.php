@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row hidden-print">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center alert alert-success">
                <strong>
                    Congratulations! You are successfully reserved.
                </strong>
            </h1>
        </div>
    </div>
</div>

<div class="container margin-top ticket-container">
    <div class="container margin-top ticket-container">
        <div class="container margin-top ticket-content-1">
            <div class="row hidden-print">
                <div class="col-md-12">
                    <button class="btn btn-default" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Print</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>E - Movie - Reservation</h1>
                    <hr>
                </div>
                <div class="col-xs-6">
                    <ul class="list-unstyled">
                        <li><h3><strong>Movie details:</strong></h3></li>
                        <li><h3>{{ $movieTitle }}</h3></li>
                        <li><h3>Cinema {{ $cinemaNumber }} - {{ date('g:i a', strtotime($startTime)) }}</h3></li>
                        <li><h3>{{ date('F j, Y', strtotime($showingDate)) }}</h3></li>
                    </ul>
                </div>
                <div class="col-xs-6 text-right">
                    <ul class="list-unstyled">
                        <li><h3><small>Transaction #: </small><strong>{{ $transactionNumber }}</strong></h3></li>
                        <li><h3>{{ date('F j, Y', strtotime($transactionDate)) }}</h3></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center margin-top">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Purchased</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Seats</td>
                            <td>{{ $ticketsBought }}</td>
                            <td>250</td>
                            <td>{{ $ticketsBought * 250 }}</td>
                        </tr>
                        <tr>
                            <td>Burger</td>
                            <td>{{ $burgerBought }}</td>
                            <td>50</td>
                            <td>{{ $burgerBought * 50 }}</td>
                        </tr>
                        <tr>
                            <td>Fries</td>
                            <td>{{ $friesBought }}</td>
                            <td>50</td>
                            <td>{{ $friesBought * 50 }}</td>
                        </tr>
                        <tr>
                            <td>Soda</td>
                            <td>{{ $sodaBought }}</td>
                            <td>30</td>
                            <td>{{ $sodaBought * 30 }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><h3>TOTAL</h3></td>
                            <td><h3>{{ $totalPrice }}</h3></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@stop