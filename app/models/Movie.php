<?php

class Movie extends Eloquent {

    public static function getAllTimes($id)
    {
        $result = DB::table('movies')
                    ->join('cinemas', 'movies.cinema_id', '=', 'cinemas.id')
                    ->join('cinema_time', 'cinemas.id', '=', 'cinema_time.cinema_id')
                    ->join('times', 'cinema_time.time_id', '=', 'times.id')
                    ->where('movies.id', $id)
                    ->select('times.start_time')
                    ->get();

        return $result;
    }
}