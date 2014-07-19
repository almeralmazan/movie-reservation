<?php

class ReservedSeat extends Eloquent {

    public $table = 'reserved_seats';

    protected $fillable = ['customer_name', 'customer_status', 'seat_id', 'cinema_id', 'time_id'];
}