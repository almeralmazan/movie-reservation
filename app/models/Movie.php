<?php

class Movie extends Eloquent {

    public function times()
    {
        $this->hasMany('Time');
    }
}