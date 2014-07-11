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
                        @foreach ($movies as $movie)
                        <option value="{{ $movie->cinema_id }}">{{ $movie->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="" for="cinema">showtimes</label>
                    <select name="" class="form-control">
                        <option value="">10:00 AM</option>
                        <option value="">12:00 PM</option>
                        <option value="">3:00 PM</option>
                        <option value="">6:00 PM</option>
                        <option value="">8:00 PM</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="row margin-top-two">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-info" role="alert">
                <h2 id="cinema-screen" class="text-center text-uppercase"></h2>
                <h1 class="text-center text-uppercase">screen</h1>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-1"><!-- palaman --></div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-danger btn-block" id="seat-1">01</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-2">02</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-3">03</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-danger btn-block" id="seat-4">04</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-5">05</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-danger btn-block" id="seat-6">06</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-7">07</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-8">08</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-9">09</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-10">10</button>
        </div>
        <div class="col-md-1"><!-- palaman --></div>
    </div>

    <br />

    <div class="row">
        <div class="col-md-1"><!-- palaman --></div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-11">11</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-12">12</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-13">13</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-14">14</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-15">15</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-16">16</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-17">17</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-18">18</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-19">19</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-20">20</button>
        </div>
        <div class="col-md-1"><!-- palaman --></div>
    </div>

    <br />

    <div class="row">
        <div class="col-md-1"><!-- palaman --></div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-21">21</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-22">22</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-23">23</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-24">24</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-25">25</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-26">26</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-27">27</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-28">28</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-29">29</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-30">30</button>
        </div>
        <div class="col-md-1"><!-- palaman --></div>
    </div>

    <br />

    <div class="row">
        <div class="col-md-1"><!-- palaman --></div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-31">31</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-32">32</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-33">33</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-34">34</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-35">35</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-36">36</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-37">37</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-38">38</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-39">39</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-40">40</button>
        </div>
        <div class="col-md-1"><!-- palaman --></div>
    </div>

    <br />

    <div class="row">
        <div class="col-md-1"><!-- palaman --></div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-41">41</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-42">42</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-43">43</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-44">44</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-45">45</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-46">46</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-47">47</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-48">48</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-49">49</button>
        </div>
        <div class="col-md-1">
            <button class="btn-seats btn btn-default btn-block" id="seat-50">50</button>
        </div>
        <div class="col-md-1"><!-- palaman --></div>
    </div>

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