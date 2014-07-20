<?php

class Transaction extends Eloquent {

    protected $fillable = [
        'receipt_number',
        'tickets_bought',
        'burger_bought',
        'fries_bought',
        'soda_bought',
        'total',
        'paid_status'
    ];
}