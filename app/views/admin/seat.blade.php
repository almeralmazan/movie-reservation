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
    <div class="row margin-top">
        <div class="col-md-4 col-md-offset-4">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="" for="cinema">Movie title</label>
                    <select name="movie_id" id="movie-select" class="form-control">
                        <option value="">-- Select Movies --</option>
                        @foreach ($movies as $movie)
                        <option value="{{ $movie->cinema_id }}">{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="" for="cinema">Showtimes</label>
                    <select name="showtimes" id="show-times" class="form-control">
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div id="populate-seats" class="row"></div>

    <div class="row margin-top-two">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-info" role="alert">
                <h2 id="cinema-screen" class="text-center text-uppercase"></h2>
                <h1 class="text-center text-uppercase">screen</h1>
            </div>
        </div>
    </div>

    <br>



    <div class="row margin-top-two">
        <div class="col-md-6 col-md-offset-3">
            <button class="btn btn-primary btn-block" id="reserve-seat" data-toggle="modal" data-target="#myModal">
                Reserve seat
            </button>
        </div>
    </div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Seat</th>
                                    <th>total of seats</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-md-7"><em id="reserving-for-seat"></em></h4></td>
                                    <td id="total-seats" class="col-md-3 text-center"></td>
                                    <td id="price-per-seat" class="col-md-1 text-center">75</td>
                                    <td id="total-seat-price" class="sub-totals col-md-1 text-center">0</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Add-ons</th>
                                    <th>Qty</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Burger</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" class="form-control" id="qty-burger" min="0">
                                    </td>
                                    <td id="price-per-burger" class="col-md-1 text-center">
                                        30
                                    </td>
                                    <td id="total-burger-price" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Fries</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" class="form-control" id="qty-fries" min="0">
                                    </td>
                                    <td id="price-per-fries" class="col-md-1 text-center">
                                        25
                                    </td>
                                    <td id="total-fries-price" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Soda</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" class="form-control" id="qty-soda" min="0">
                                    </td>
                                    <td id="price-per-soda" class="col-md-1 text-center">
                                        15
                                    </td>
                                    <td id="total-soda-price" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                    <td class="text-center text-danger"><h4 id="total"><strong></strong></h4></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Proceed to payment</button>
            </div>

        </div>
    </div>
</div>

</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop