<?php

class Time extends Eloquent {

    public function movie()
    {
        $this->hasOne('Movie');
    }
}