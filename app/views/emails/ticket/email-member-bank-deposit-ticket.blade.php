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
    <div class="container margin-top ticket-content-2">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>E - Movie - Ticket</h1>
                <hr>
            </div>
            <div class="col-md-12 text-center">
                <h3><small>Transaction #: </small>{{ $transactionNumber }}</h3>
                <h2 class="text-uppercase"><strong>{{ $movieTitle }}</strong></h2>
            </div>
            <div class="col-md-12 text-center">
                <h3><small>Cinema #: </small>{{ $cinemaNumber }}</h3>
                <h3><small>Movie Date: </small>{{ date('F j, Y', strtotime($showingDate)) }}</h3>
                <h3><small>Showtime: </small>{{ date('g:i a', strtotime($startTime)) }}</h3>
            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-6 text-right">
                    <h4><small>Name: </small>{{ $fullName }}</h4>
                </div>
                <div class="col-md-6 text-left">
                    <h4><small>Seat #: </small>{{ $seatNumbers }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@stop