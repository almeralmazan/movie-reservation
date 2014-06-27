<?php

class Time extends Eloquent {

    public $timestamps = false;

    public function movie()
    {
        $this->hasOne('Movie');
    }
}