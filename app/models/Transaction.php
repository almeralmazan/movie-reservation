<?php

class Transaction extends Eloquent {

    protected $fillable = [
        'transaction_number',
        'receipt_number',
        'tickets_bought',
        'burger_bought',
        'fries_bought',
        'soda_bought',
        'total',
        'paid_status'
    ];
}