<?php

class HomeController extends BaseController {

	public function index()
	{
        $title = 'Home Page';
        $movies = Movie::all();
        $randomTrailer = DB::select('SELECT trailer_url FROM movies ORDER BY RAND() LIMIT 1');
        $trailer = $randomTrailer[0]->trailer_url;
		return View::make('home.index', compact('title', 'movies', 'trailer'));
	}

    public function forgotPassword()
    {
        $title = 'Forgot Password';
        return View::make('home.forgot-password', compact('title'));
    }

    public function show($id)
    {
        $title = 'Movie Page';
        $movie = Movie::find($id);
        $movieTimes = Movie::getAllTimes($id);
        return View::make('home.show', compact('title', 'movie', 'movieTimes'));
    }
}
