<div class="modal fade" id="bank-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>

            {{ Form::open(['url' => 'member/reserved-seat', 'id' => 'member-reserve-seat']) }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">

                            <input type="hidden" id="member-name" name="member_name" value="{{ Session::get('member_name') }}"/>
                            <?php $cinema_number = show_cinema_number(Session::get('movie_id')) ?>
                            <input type="hidden" name="cinema_id" id="cinema-id" value="{{ $cinema_number->cinema_id }}"/>

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
                                    <td id="price-per-seat" class="col-md-1 text-center">250</td>
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
                                    <th class="text-center">Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Burger</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" value="0" class="form-control" id="qty-burger" min="0">
                                    </td>
                                    <td id="price-per-burger" class="col-md-1 text-center">
                                        50
                                    </td>
                                    <td id="total-burger-price" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Fries</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" value="0" class="form-control" id="qty-fries" min="0">
                                    </td>
                                    <td id="price-per-fries" class="col-md-1 text-center">
                                        50
                                    </td>
                                    <td id="total-fries-price" class="col-md-1 text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="col-md-7">
                                        <em>Soda</em>
                                    </td>
                                    <td class="col-md-3">
                                        <input type="number" value="0" class="form-control" id="qty-soda" min="0">
                                    </td>
                                    <td id="price-per-soda" class="col-md-1 text-center">
                                        30
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
                <a href="{{ URL::to('member/online-payment') }}" id="online-deposit" class="btn btn-primary">Online Payment (Paypal)</a>
                {{ Form::submit('Bank Deposit', ['id' => 'bank-deposit', 'class' => 'btn btn-warning']) }}
                <p id="sms-loading-message" style="color: green; margin-top: 10px;"></p>
            </div>
        </div>
    </div>
</div>