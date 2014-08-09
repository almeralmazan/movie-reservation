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
                </thead>

                <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->receipt_number }}</td>
                        <td>{{ date('F j, Y', strtotime($transaction->created_at)) }}</td>
                        <td>{{ $transaction->title }}</td>
                        <td>{{ date('h:m a', strtotime($transaction->start_time)) }}</td>
                        <td>{{ $transaction->tickets_bought }}</td>
                        <td>{{ $transaction->burger_bought }}</td>
                        <td>{{ $transaction->fries_bought }}</td>
                        <td>{{ $transaction->soda_bought }}</td>
                        <td>{{ $transaction->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop