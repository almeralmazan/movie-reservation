<?php

class HomeController extends BaseController {

	public function index()
	{
        $title = 'Home Page';
        $movies = Movie::all();
		return View::make('home.index', compact('title', 'movies'));
	}

    public function show($id)
    {
        $title = 'Movie Page';
        $movie = Movie::find($id);
        return View::make('home.show', compact('title', 'movie'));
    }
}
