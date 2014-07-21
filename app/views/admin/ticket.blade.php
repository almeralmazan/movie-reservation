@extends('layouts.admin')

@section('content')
<div class="container margin-top ticket-container">
    <div class="container margin-top ticket-content-1">
        <div class="row hidden-print">
            <div class="col-md-12">
                <button class="btn btn-default" onclick="window.print()"> <span class="glyphicon glyphicon-print"></span> Print</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <h1>Receipt # 000001</h1>
                <hr>
            </div>
            <div class="col-xs-6">
                <ul class="list-unstyled">
                    <li><h4><strong>Movie details:</strong></h4></li>
                    <li><h4>How to train your dragon 2</h4></li>
                    <li><h4>Cinema 3 - 10:00 AM</h4></li>
                    <li><h4>July 23, 2014</h4></li>
                </ul>
            </div>
            <div class="col-xs-6 text-right">
                <ul class="list-unstyled">
                    <li><h4><strong>Billed to:</strong></h4></li>
                    <li><h4>Jenary Madia</h4></li>
                    <li><h4>July 20, 2014</h4></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center margin-top">
                <pre>This will serve as your official receipt.Amusement and cultural taxt included.Valid only on the screening indicated.Please keep ticket at all times for transaction reference.</pre>
            </div>
        </div>
    </div>
    <div class="container margin-top ticket-content-2">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                        <td>5</td>
                        <td>500</td>
                        <td>2500</td>
                    </tr>
                    <tr>
                        <td>Burger</td>
                        <td>5</td>
                        <td>500</td>
                        <td>2500</td>
                    </tr>
                    <tr>
                        <td>Fries</td>
                        <td>5</td>
                        <td>500</td>
                        <td>2500</td>
                    </tr>
                    <tr>
                        <td>Soda</td>
                        <td>5</td>
                        <td>500</td>
                        <td>2500</td>
                    </tr>
                    <tr>
                        <td colspan="3"><h3>TOTAL</h3></td>
                        <td><h3>123,400</h3></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
