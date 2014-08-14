<?php

class CinemaTime extends Eloquent {

    public $table = 'cinema_time';

    public $timestamps = false;

    protected $fillable = ['cinema_id', 'time_id'];
}