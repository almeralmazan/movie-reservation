<?php

class MemberController extends BaseController {

    public function index()
    {
        $title = 'Member Page';
        $movies = Movie::all();
        return View::make('member.index', compact('title', 'movies'));
    }

    public function reserve($movieId)
    {
        $title = 'Movie Reservation Page';
        $movie = Movie::find($movieId);
        $times = Movie::getAllTimes($movieId);
        return View::make('member.reserve-movie', compact('title', 'movie', 'times'));
    }

    public function register()
    {
        // Using Auth::attempt, no need for password to be hash
        $rules = [
            'first_name'            =>  'required|alpha|min:2',
            'last_name'             =>  'required|alpha|min:2',
            'mobile_number'         =>  'required|numeric|regex:/^(09)([0-9]{9})$/',
            'email'                 =>  'required|email|unique:users',
            'password'              =>  'required|min:8|confirmed',
            'password_confirmation' =>  'required'
        ];

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails())
        {
            return Response::json([
                'success' => false,
                'message' => $validation->errors()->toArray()
            ]);
        }
        else
        {
            User::create([
                'first_name'    =>  Input::get('first_name'),
                'last_name'     =>  Input::get('last_name'),
                'mobile_number' =>  '+63' . substr(Input::get('mobile_number'), 1),
                'email'         =>  Input::get('email'),
                'password'      =>  Hash::make(Input::get('password')),
                'admin'         =>  0
            ]);

            return Response::json([
                'success' => true,
                'message' => 'Successfully registered!'
            ]);
        }
    }
}