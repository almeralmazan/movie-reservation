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
            'title'         =>  Input::get('movie_title'),
            'description'   =>  Input::get('movie_description'),
            'image'         =>  $filename,
            'trailer_url'   =>  Input::get('trailer_url'),
            'showing_date'  =>  '0000-00-00',
            'cinema_id'     =>  0
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

    public function updateMovie($movieId)
    {
        $movie = Movie::find($movieId);
        $movie->title = Input::get('movie_title');
        $movie->description = Input::get('movie_description');
        $movie->trailer_url = Input::get('movie_trailer_url');
        $movie->save();

        return Redirect::back()->withMessage('Updated Successfully!');
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
        $cinemaId           = Input::get('cinemaId');
        $selectedTime       = Input::get('selectedTime');
        $walkinName         = Input::get('walkinName');
        $seatsReserved      = Input::get('seatsReserved');
        $ticketsQuantity    = Input::get('seatsQuantity');
        $burgerQuantity     = Input::get('burgerQuantity');
        $friesQuantity      = Input::get('friesQuantity');
        $sodaQuantity       = Input::get('sodaQuantity');
        $totalBurgerPrice   = Input::get('totalBurgerPrice');
        $totalFriesPrice    = Input::get('totalFriesPrice');
        $totalSodaPrice     = Input::get('totalSodaPrice');
        $totalPrice         = Input::get('totalPrice');

        // Get transaction count
        $transactionCount = Transaction::count();


        $reservedSeats = explode(',', str_replace('seat-', '', $seatsReserved));

        for ($i = 0; $i < count($reservedSeats); $i++)
        {
            ReservedSeat::create([
                'customer_name'     =>  $walkinName,
                'customer_status'   =>  'walkin',
                'transaction_id'    =>  $transactionCount + 1,
                'seat_number'       =>  $reservedSeats[$i],
                'cinema_id'         =>  $cinemaId,
                'time_id'           =>  $selectedTime
            ]);
        }

        Transaction::create([
            'transaction_number'    =>  'WI-' . strtoupper(str_random(8)),
            'receipt_number'        =>  $transactionCount + 1,
            'tickets_bought'        =>  $ticketsQuantity,
            'burger_bought'         =>  $burgerQuantity,
            'fries_bought'          =>  $friesQuantity,
            'soda_bought'           =>  $sodaQuantity,
            'total'                 =>  $totalPrice,
            'paid_status'           =>  1
        ]);

        // store walkin name in session
        Session::put('customer_name', $walkinName);

        return Response::json([
            'transactionId' =>  ($transactionCount + 1)
        ]);
    }

    public function getMovieTimesById($cinemaId)
    {
        $result =  DB::table('times')
                    ->select(DB::raw("TIME_FORMAT(times.start_time, '%H:%i %p') AS start_time"), "cinema_time.time_id")
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
        $cinema_id = $cinemaId;
        $movie = Movie::find($cinemaId);
        $cinemaTimes = CinemaTime::where('cinema_id', $cinemaId)->get();
        $times = Time::all();

        return View::make('admin.cinema-update-datetime', compact('title', 'cinema_id', 'movie', 'cinemaTimes', 'times'));
    }

    public function updateCinema()
    {
        $cinemaId = Input::get('cinema_id');
        $showingDate = Input::get('movie_showing_date');

        $times = array_except(Input::all(), ['cinema_id', 'movie_showing_date', '_token']);

        CinemaTime::where('cinema_id', $cinemaId)->delete();

        Movie::where('cinema_id', $cinemaId)->update([
            'showing_date'  =>  $showingDate
        ]);

        for ($i = 0; $i < count($this->getOnlyTheNumbers('time_', $times)); $i++)
        {
            CinemaTime::create([
                'cinema_id' =>  $cinemaId,
                'time_id'   =>  (int) $this->getOnlyTheNumbers('time_', $times)[$i]
            ]);
        }

        return Redirect::back()->withMessage('Updated Successfully');
    }

    private function getOnlyTheNumbers($wordToReplace, $times)
    {
        return explode(', ', str_replace($wordToReplace, '', implode(', ', array_keys($times))));
    }

    public function ticket()
    {
        $title = 'Ticket Page';
        return View::make('admin.ticket', compact('title'));
    }

    public function receiptTicket($transaction_id)
    {
        $transactionId = (int) $transaction_id;
        $title = 'Receipt Ticket Page';

        $seats = ReservedSeat::where('transaction_id', $transactionId)->lists('seat_number');
        $seatNumbers = implode(', ', $seats);

        $user = DB::table('transactions')
            ->select(
                'transactions.transaction_number',
                'movies.title',
                'reserved_seats.cinema_id',
                'times.start_time',
                'movies.showing_date',
                'transactions.tickets_bought',
                'transactions.burger_bought',
                'transactions.fries_bought',
                'transactions.soda_bought',
                'transactions.total'
            )
            ->join('reserved_seats', 'reserved_seats.transaction_id', '=', 'transactions.id')
            ->join('movies', 'movies.cinema_id', '=', 'reserved_seats.cinema_id')
            ->join('times', 'times.id', '=', 'reserved_seats.time_id')
            ->where('transactions.id', $transactionId)
            ->first();

        $movieTitle = $user->title;
        $cinemaNumber = $user->cinema_id;
        $startTime = $user->start_time;
        $showingDate = $user->showing_date;
        $transactionNumber = $user->transaction_number;
        $ticketsBought = $user->tickets_bought;
        $burgerBought = $user->burger_bought;
        $friesBought = $user->fries_bought;
        $sodaBought = $user->soda_bought;
        $totalPrice = $user->total;
        $fullName = Session::get('customer_name');

        return View::make('emails.ticket.receipt-ticket', compact(
            'title', 'seatNumbers', 'movieTitle', 'cinemaNumber', 'startTime',
            'showingDate', 'transactionNumber', 'ticketsBought', 'burgerBought',
            'friesBought', 'sodaBought', 'totalPrice', 'fullName'
        ));
    }

    public function transaction()
    {
        $title = 'Transaction Page';
        return View::make('admin.transaction', compact('title'));
    }

    public function payTransactionToBank($transactionId)
    {
        $transactionNumber = 'PSB-' . strtoupper( str_random(8) );

        $transaction = Transaction::find($transactionId);
        $transaction->transaction_number = $transactionNumber;
        $transaction->paid_status = 1;
        $transaction->save();

        $seats = ReservedSeat::where('transaction_id', $transactionId)->lists('seat_number');
        $seatNumbers = implode(', ', $seats);

        $user = DB::table('users')
                    ->select(
                        'users.email',
                        'users.mobile_number',
                        'users.first_name',
                        'users.last_name',
                        'transactions.transaction_number',
                        'movies.title',
                        'reserved_seats.cinema_id',
                        'times.start_time',
                        'movies.showing_date',
                        'transactions.tickets_bought',
                        'transactions.burger_bought',
                        'transactions.fries_bought',
                        'transactions.soda_bought',
                        'transactions.total'
                    )
                    ->join('reserved_seats', 'reserved_seats.customer_name', '=', 'users.first_name')
                    ->join('movies', 'movies.cinema_id', '=', 'reserved_seats.cinema_id')
                    ->join('transactions', 'transactions.id', '=', 'reserved_seats.transaction_id')
                    ->join('times', 'times.id', '=', 'reserved_seats.time_id')
                    ->where('transactions.id', $transactionId)
                    ->first();

        // Initiate sms sending to user
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        $client->account->messages->create(array(
            'To' => $user->mobile_number,
            'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
            'Body' => 'You can now claim your receipt and ticket with your email account. Thank you and enjoy!'
        ));

        Mail::send('emails.ticket.email-member-bank-deposit-ticket',
            [
                'title'             => 'Receipt and Ticket',
                'fullName'          =>  $user->first_name . ' ' . $user->last_name,
                'transactionNumber' =>  $user->transaction_number,
                'movieTitle'        =>  $user->title,
                'cinemaNumber'      =>  $user->cinema_id,
                'startTime'         =>  $user->start_time,
                'showingDate'       =>  $user->showing_date,
                'ticketsBought'     =>  $user->tickets_bought,
                'burgerBought'      =>  $user->burger_bought,
                'friesBought'       =>  $user->fries_bought,
                'sodaBought'        =>  $user->soda_bought,
                'totalPrice'        =>  $user->total,
                'seatNumbers'       =>  $seatNumbers
            ], function($message) use ($user)
        {
            $message->to($user->email, $user->first_name . ' ' . $user->last_name)
                    ->subject('Receipt and Ticket');
        });

        return Redirect::back()->withMessage('Paid successfully');
    }

    public function deleteTransaction($transactionId)
    {
        Transaction::find($transactionId)->delete();
        ReservedSeat::where('transaction_id', $transactionId)->delete();

        return Redirect::back()->withDelete('Deleted successfully');
    }

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions')
                            ->select(
                                'transactions.id',
                                'transactions.receipt_number',
                                'reserved_seats.customer_name',
                                'movies.title as movie_title',
                                'transactions.created_at',
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