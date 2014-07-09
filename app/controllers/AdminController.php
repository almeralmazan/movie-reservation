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

    public function editMoviePage()
    {
        $title = 'Edit Movie Page';
        return View::make('admin.edit-movie-page', compact('title'));
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
        return View::make('admin.seat', compact('title'));
    }

    public function cinema()
    {
        $title = 'Cinema Page';
        return View::make('admin.cinema', compact('title'));
    }
}