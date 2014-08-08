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

    public function getAllMembers()
    {
        $members = DB::table('users')
                    ->orderBy('last_name')
                    ->orderBy('first_name')
                    ->get();

        return $members;
    }

    public function seat()
    {
        $title = 'Seat Page';
        $movies = Movie::all();
        return View::make('admin.seat', compact('title', 'movies'));
    }

    public function reservedSeat()
    {
        $burger_bought = Input::get('burger_bought');
        $fries_bought = Input::get('fries_bought');
        $soda_bought = Input::get('soda_bought');

        dd($burger_bought);
    }

    public function getMovieTimesById($cinemaId)
    {
        $result =  DB::table('times')
                    ->select('times.start_time', 'cinema_time.time_id')
                    ->join('cinema_time', 'cinema_time.time_id', '=', 'times.id')
                    ->where('cinema_time.cinema_id', $cinemaId)
                    ->get();

        return $result;
    }

    public function cinema()
    {
        $title = 'Cinema Page';
        $cinemas = Cinema::all();
        return View::make('admin.cinema', compact('title', 'cinemas'));
    }

    public function manageShowtime($cinemaId)
    {
        $title = 'Manage Showtime';
        $movie = Movie::find($cinemaId);
        return View::make('admin.cinema-add-showtime', compact('title', 'movie'));
    }

    public function transaction()
    {
        $title = 'Transaction Page';
        return View::make('admin.transaction', compact('title'));
    }

    public function ticket()
    {
        $title = 'Ticket Page';
        return View::make('admin.ticket', compact('title'));
    }

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions')
                            ->select(
                                'transactions.receipt_number',
                                'reserved_seats.customer_name',
                                'movies.title as movie_title',
                                'times.start_time',
                                'transactions.tickets_bought',
                                'transactions.burger_bought',
                                'transactions.fries_bought',
                                'transactions.soda_bought',
                                'transactions.total',
                                'transactions.paid_status'
                            )
                            ->join('reserved_seats', 'reserved_seats.transaction_id', '=', 'transactions.id')
                            ->join('movies', 'movies.cinema_id', '=', 'reserved_seats.cinema_id')
                            ->join('times', 'times.id', '=', 'reserved_seats.time_id')
                            ->distinct()
                            ->get();

        return $transactions;
    }

    public function addShowTime($cinemaId)
    {
        $title = 'Add Showtime Page';
        $cinema = Cinema::find($cinemaId);
        return View::make('admin.cinema-add-showtime', compact('title', 'cinema'));
    }

    public function getReservedSeats($cinemaId, $timeId)
    {
        $result = DB::table('reserved_seats')
                    ->select(
                        'reserved_seats.seat_number',
                        'transactions.paid_status',
                        'reserved_seats.customer_name',
                        'reserved_seats.time_id'
                    )
                    ->join('transactions', 'transactions.id', '=', 'reserved_seats.transaction_id')
                    ->where('reserved_seats.cinema_id', $cinemaId)
                    ->where('reserved_seats.time_id', $timeId)
                    ->get();

        return $result;
    }
}