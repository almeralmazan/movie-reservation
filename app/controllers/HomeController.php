<?php

class HomeController extends BaseController {

	public function index()
	{
        $title = 'Home Page';
		return View::make('home.index', compact('title'));
	}

}
