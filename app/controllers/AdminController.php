<?php

class AdminController extends BaseController {

    public function index()
    {
        $title = 'Admin Page';
        return View::make('admin.index', compact('title'));
    }

    public function dashboard()
    {
        $title = 'Admin Dashboard Page';
        return View::make('admin.dashboard', compact('title'));
    }

    public function movie()
    {
        $title = 'Admin Movie Page';
        $movies = Movie::all();
        return View::make('admin.movie', compact('title', 'movies'));
    }

    public function addMoviePage()
    {
        $title = 'Add Movie Page';
        return View::make('admin.add-movie-page', compact('title'));
    }

    public function addMovie()
    {
        $file            = Input::file('image');
        $destinationPath = public_path() . '/img/movies';
        $filename        = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);

        Movie::create([
            'title'         => Input::get('movie_title'),
            'description'   => Input::get('movie_description'),
            'image'         => $filename,
            'trailer_url'   => Input::get('trailer_url'),
        ]);

        return Redirect::back()->withMessage('Created successfully');
    }

    public function deleteMovie($movieId)
    {
        $movie = Movie::find($movieId);
        $movie->delete();
        return Redirect::back()->withDelete('Deleted successfully');
    }

    public function editMovie($movieId)
    {
        $title = 'Edit Movie Page';
        $movie = Movie::find($movieId);
        return View::make('admin.edit-movie-page', compact('title', 'movie'));
    }

    public function member()
    {
        $title = 'Member Page';
        $users = User::all();
        return View::make('admin.member', compact('title', 'users'));
    }

    public function seat()
    {
        $title = 'Seat Page';
        $movies = Movie::all();
        return View::make('admin.seat', compact('title', 'movies'));
    }

    public function cinema()
    {
        $title = 'Cinema Page';
        $cinemas = Cinema::all();
        return View::make('admin.cinema', compact('title', 'cinemas'));
    }

    public function addShowTime($cinemaId)
    {
        $title = 'Add Showtime Page';
        $cinema = Cinema::find($cinemaId);
        return View::make('admin.cinema-add-showtime', compact('title', 'cinema'));
    }
}