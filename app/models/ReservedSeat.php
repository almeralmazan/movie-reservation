<?php

class ReservedSeat extends Eloquent {

    public $table = 'reserved_seats';

    protected $fillable = ['customer_name', 'customer_status', 'transaction_id', 'seat_number', 'cinema_id', 'time_id'];
}