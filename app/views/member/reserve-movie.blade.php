@extends('layouts.main')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('/member') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>


    <!-- Left Panel -->
    <div class="row margin-top">
        <div class="content col-md-3">
            <div class="well">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="movie-title-single title">{{ $movie->title }}</h2>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{ HTML::image('img/movies/' . $movie->image, null, ['class' => 'img-rounded img-responsive', 'height' => '300']) }}
                    </div>

                    <div class="col-md-12">
                        <div class="row margin-top-two">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <span><b>Sypnosis</b></span>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p class="text-justify">After making their way through high school (twice), big changes are in store for officers Schmidt and Jenko when they go deep undercover at a local college. (from IMDb)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-5">
                                <span><b>Showing date:</b></span>
                            </div>

                            <div class="movie-details col-xs-8 col-sm-8 col-md-7">
                                <p>{{ date('F j, Y', strtotime($movie->showing_date)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Right Panel -->
        <div class="col-md-9">
            <div class="well">
                <div class="row margin-top-two">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label text-left">Show times</label>

                                <div class="col-sm-6">
                                    <select name="show_start_time" id="show-start-time" class="form-control">
                                        <option value="empty">Select time</option>
                                        @foreach ($times as $time)
                                            <option value="{{ $time->id }}">{{ $time->start_time }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="row margin-top-two">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-info" role="alert">
                            <h1 class="text-center text-uppercase">screen</h1>
                        </div>
                    </div>
                </div>

                <div id="populate-seats" class="row"></div>

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
                                <button type="button" class="btn btn-primary">Online Payment (Paypal)</button>
                                <a href="{{ URL::to('member/success-page') }}" id="bank-deposit" class="btn btn-warning">Bank Deposit</a>
                            </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop