<?php

class MemberController extends BaseController {

    public function index()
    {
        $title = 'Member Page';
        $movies = Movie::all();
        return View::make('member.index', compact('title', 'movies'));
    }

    public function forgotPassword()
    {
        $title = 'Forgot Password';
        return View::make('member.forgot-password', compact('title'));
    }

    public function memberProfile()
    {
        $title = 'Profile Page';

        $member = User::where('email', Session::get('email'))->first();

        return View::make('member.member-profile', compact('title', 'member'));
    }

    public function updateAccount()
    {
        $member = User::where('email', Session::get('email'))->first();
        $member->first_name = Input::get('first_name');
        $member->last_name = Input::get('last_name');
        $member->mobile_number = Input::get('mobile_number');
        $member->save();

        return Redirect::back()->withMessage('Account Updated successfully!');
    }

    public function memberTransaction()
    {
        $title = 'Transaction Page';
        return View::make('member.member-transaction', compact('title'));
    }

    public function reserve($movieId)
    {
        $title = 'Movie Reservation Page';
        $movie = Movie::find($movieId);
        $times = Movie::getAllTimes($movieId);
        Session::put('movie_id', $movieId);
        return View::make('member.reserve-movie', compact('title', 'movie', 'times'));
    }

    public function ticket()
    {
        $title = 'Member Ticket Page';
        return View::make('member.ticket', compact('title'));
    }

    public function register()
    {
        // Using Auth::attempt, no need for password to be hash
        $rules = [
            'first_name'            =>  'required|alpha|min:2',
            'last_name'             =>  'required|min:2',
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

    public function getReservedSeats($timeId)
    {
        $movieId = (int) Session::get('movie_id');

        $result = DB::table('reserved_seats')
                    ->select(
                        'reserved_seats.seat_number',
                        'transactions.paid_status',
                        'reserved_seats.customer_name',
                        'reserved_seats.time_id'
                    )
                    ->join('transactions', 'transactions.id', '=', 'reserved_seats.transaction_id')
                    ->where('reserved_seats.cinema_id', $movieId)
                    ->where('reserved_seats.time_id', $timeId)
                    ->get();

        return $result;
    }
}