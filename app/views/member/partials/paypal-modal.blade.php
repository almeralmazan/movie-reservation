
<div class="modal fade" id="myModal-paypal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            {{ Form::open(['id' => 'paypal-reserve', 'method' => 'GET']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">

                            <input type="hidden" id="member-name-paypal" name="member_name_paypal" value="{{ Session::get('member_name') }}"/>
                            <?php $cinema_number = show_cinema_number(Session::get('movie_id')) ?>
                            <input type="hidden" name="cinema_id_paypal" id="cinema-id-paypal" value="{{ $cinema_number->cinema_id }}"/>

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
                                    <td class="col-md-7"><em id="reserving-for-seat-paypal"></em></h4></td>
                                    <td id="total-seats-paypal" class="col-md-3 text-center"></td>
                                    <td id="price-per-seat-paypal" class="col-md-1 text-center">250</td>
                                    <td id="total-seat-price-paypal" class="sub-totals col-md-1 text-center">0</td>
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
                                        <input type="number" value="0" min="0" class="form-control" id="qty-burger-paypal">
                                    </td>
                                    <td id="price-per-burger-paypal" class="col-md-1 text-center">
                                        50
                                    </td>
                                    <td id="total-burger-price-paypal" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Fries</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" value="0" min="0" class="form-control" id="qty-fries-paypal">
                                    </td>
                                    <td id="price-per-fries-paypal" class="col-md-1 text-center">
                                        50
                                    </td>
                                    <td id="total-fries-price-paypal" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Soda</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" value="0" min="0" class="form-control" id="qty-soda-paypal">
                                    </td>
                                    <td id="price-per-soda-paypal" class="col-md-1 text-center">
                                        30
                                    </td>
                                    <td id="total-soda-price-paypal" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                    <td class="text-center text-danger"><h4 id="total-paypal"><strong></strong></h4></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                {{ Form::submit('PayPal Payment', ['id' => 'paypal-deposit', 'class' => 'btn btn-warning']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
