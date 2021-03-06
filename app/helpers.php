<?php

function show_times($movieId)
{
    return DB::table('times')
            ->select('times.start_time')
            ->join('cinema_time', 'cinema_time.time_id', '=', 'times.id')
            ->join('movies', 'movies.cinema_id', '=', 'cinema_time.cinema_id')
            ->where('movies.id', $movieId)
            ->get();
}

function show_cinema_number($movieId)
{
    return DB::table('movies')
            ->select('movies.cinema_id')
            ->where('movies.id', $movieId)
            ->first();
}

function show_movie_title($cinemaId)
{
    return DB::table('movies')
            ->select('movies.title')
            ->where('movies.cinema_id', $cinemaId)
            ->first();
}

function set_bg()
{
    return Request::is('/') ? 'cinema-background' : '';
}