<?php

class Movie extends Eloquent {

    protected $fillable = ['title', 'description', 'image', 'trailer_url'];

    public static function getAllTimes($id)
    {
        $result = DB::table('movies')
                    ->join('cinemas', 'movies.cinema_id', '=', 'cinemas.id')
                    ->join('cinema_time', 'cinemas.id', '=', 'cinema_time.cinema_id')
                    ->join('times', 'cinema_time.time_id', '=', 'times.id')
                    ->where('movies.id', $id)
                    ->select("times.id", DB::raw("TIME_FORMAT(times.start_time, '%H:%i %p') AS start_time"))
                    ->get();

        return $result;
    }
}