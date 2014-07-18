<?php

class ReservedSeat extends Eloquent {

    protected $fillable = ['customer_name', 'customer_status', 'seat_id', 'cinema_id', 'time_id'];
}