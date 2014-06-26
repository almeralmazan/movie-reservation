<?php

class HomeController extends BaseController {

	public function index()
	{
        $title = 'Home Page';
		return View::make('home.index', compact('title'));
	}

    public function show($id)
    {
        $title = 'Movie Page';
        $movie = Movie::find($id);
        return View::make('home.show', compact('title', 'movie'));
    }
}
