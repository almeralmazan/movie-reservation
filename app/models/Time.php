<?php

class Time extends Eloquent {

    public $timestamps = false;

    public function movie()
    {
        $this->hasOne('Movie');
    }

    public static function getAllTimesByCinemaId($cinemaId)
    {
        $result = DB::table('times')
                    ->join('cinema_time', 'cinema_time.time_id', '=', 'times.id')
                    ->join('movies', 'movies.cinema_id', '=', 'cinema_time.cinema_id')
                    ->where('movies.cinema_id', $cinemaId)
                    ->select('times.start_time')
                    ->get();

        return $result;
    }
}