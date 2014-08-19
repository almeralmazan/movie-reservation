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

    public function activateMessage()
    {
        $title = 'Activate Page';

        return View::make('member.activate-message', compact('title'));
    }
    public function updateAccount()
    {
        $member = User::where('email', Session::get('email'))->first();
//        $member->first_name = Input::get('first_name');
//        $member->last_name = Input::get('last_name');
        $member->mobile_number = Input::get('mobile_number');
        $member->save();

        return Redirect::back()->withMessage('Contact # updated successfully!');
    }

    public function changePassword()
    {
        $currentPassword = Input::get('current_password');
        $newPassword = Input::get('new_password');
        $confirmPassword = Input::get('confirm_password');

        $member = User::where('email', Session::get('email'))->first();

        if (Hash::check($currentPassword, $member->password))
        {
            if ($newPassword == $confirmPassword)
            {
                $member->password = Hash::make($newPassword);
                $member->save();

                return Response::json([
                    'success'   =>  true,
                    'message'   =>  'Password changed successfully'
                ]);
            }
            else
            {
                return Response::json([
                    'success'   =>  false,
                    'message'   =>  "New and Confirm password doesn't match"
                ]);
            }
        }
        else
        {
            return Response::json([
                'success'   =>  false,
                'message'   =>  'Current password is invalid'
            ]);
        }

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

    public function paypalReservedSeat()
    {
        $cinemaId           = Input::get('cinemaId');
        $selectedTime       = Input::get('selectedTime');
        $memberName         = Input::get('memberName');
        $seatsReserved      = Input::get('seatsReserved');
        $ticketsQuantity    = Input::get('seatsQuantity');
        $burgerQuantity     = Input::get('burgerQuantity');
        $friesQuantity      = Input::get('friesQuantity');
        $sodaQuantity       = Input::get('sodaQuantity');
        $totalPrice         = Input::get('totalPrice');

        // Get transaction count
        $transactionCount = Transaction::count();


        $reservedSeats = explode(',', str_replace('seat-', '', $seatsReserved));

        $reservedSeatId = '';

        for ($i = 0; $i < count($reservedSeats); $i++)
        {
            $reservedSeatId = ReservedSeat::create([
                'customer_name'     =>  $memberName,
                'customer_status'   =>  'member-paypal',
                'transaction_id'    =>  $transactionCount + 1,
                'seat_number'       =>  $reservedSeats[$i],
                'cinema_id'         =>  $cinemaId,
                'time_id'           =>  $selectedTime
            ]);
        }

        Transaction::create([
            'transaction_number'    =>  '',
            'receipt_number'        =>  $transactionCount + 1,
            'tickets_bought'        =>  $ticketsQuantity,
            'burger_bought'         =>  $burgerQuantity,
            'fries_bought'          =>  $friesQuantity,
            'soda_bought'           =>  $sodaQuantity,
            'total'                 =>  $totalPrice,
            'paid_status'           =>  0
        ]);

        // store walkin name in session
        Session::put('customer_name', $memberName);

        return Response::json([
            'transactionId'     =>  ($transactionCount + 1),
            'totalPrice'        =>  $totalPrice
        ]);
    }

    public function bankDeposit()
    {
        $cinemaId           = Input::get('cinemaId');
        $selectedTime       = Input::get('selectedTime');
        $memberName         = Input::get('memberName');
        $seatsReserved      = Input::get('seatsReserved');
        $ticketsQuantity    = Input::get('seatsQuantity');
        $burgerQuantity     = Input::get('burgerQuantity');
        $friesQuantity      = Input::get('friesQuantity');
        $sodaQuantity       = Input::get('sodaQuantity');
        $totalPrice         = Input::get('totalPrice');

        // Get transaction count
        $transactionCount = Transaction::count();


        $reservedSeats = explode(',', str_replace('seat-', '', $seatsReserved));

        for ($i = 0; $i < count($reservedSeats); $i++)
        {
            ReservedSeat::create([
                'customer_name'     =>  $memberName,
                'customer_status'   =>  'member-bank',
                'transaction_id'    =>  $transactionCount + 1,
                'seat_number'       =>  $reservedSeats[$i],
                'cinema_id'         =>  $cinemaId,
                'time_id'           =>  $selectedTime
            ]);
        }

        Transaction::create([
            'transaction_number'    =>  'PSB-' . strtoupper(str_random(8)),
            'receipt_number'        =>  $transactionCount + 1,
            'tickets_bought'        =>  $ticketsQuantity,
            'burger_bought'         =>  $burgerQuantity,
            'fries_bought'          =>  $friesQuantity,
            'soda_bought'           =>  $sodaQuantity,
            'total'                 =>  $totalPrice,
            'paid_status'           =>  1
        ]);

        // Notify user thru sms
        $this->notifyUserWithSms($totalPrice);

        return Response::json([
            'transactionId' =>  ($transactionCount + 1)
        ]);
    }

    // Bank Deposit
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

        Mail::send('emails.ticket.receipt-ticket',
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

    public function memberTransaction()
    {
        $title = 'Transaction Page';

        $member = User::where('email', Session::get('email'))->first();

        $transactions = DB::table('transactions')
                            ->select(
                                'transactions.receipt_number',
                                'transactions.created_at',
                                'movies.title',
                                'times.start_time',
                                'transactions.tickets_bought',
                                'transactions.burger_bought',
                                'transactions.fries_bought',
                                'transactions.soda_bought',
                                'transactions.total'
                            )
                            ->join('reserved_seats', 'reserved_seats.transaction_id', '=', 'transactions.id')
                            ->join('movies', 'movies.cinema_id', '=', 'reserved_seats.cinema_id')
                            ->join('times', 'times.id', '=', 'reserved_seats.time_id')
                            ->where('reserved_seats.customer_name', $member->first_name)
                            ->distinct()
                            ->get();

        return View::make('member.member-transaction', compact('title', 'transactions'));
    }

    public function reserve($movieId)
    {
        $title = 'Movie Reservation Page';
        $movie = Movie::find($movieId);
        $times = Movie::getAllTimes($movieId);
        Session::put('movie_id', $movieId);
        return View::make('member.reserve-movie', compact('title', 'movie', 'times'));
    }

    public function notifyUserWithSms($totalPrice)
    {
        // Initiate sms sending to user
        $account_sid = $_ENV['TWILIO_SID'];
        $auth_token = $_ENV['TWILIO_AUTH_TOKEN'];
        $client = new Services_Twilio($account_sid, $auth_token);

        $client->account->messages->create(array(
            'To' => Session::get('mobile_number'),
            'From' => $_ENV['TWILIO_ACCOUNT_NUMBER'],
            'Body' => 'You can now deposit your payment at the nearest PS Bank Branch ' .
                      'at your location. ' . 'Deposit the total amount of P' . $totalPrice . ' pesos ' .
                      "to this \n\nAccount Number: \n5299-7876-5050-7727. \n\nNote: If you cannot pay one day " .
                      'before the movie showtime, your transaction/s will be cancelled.'
        ));
    }

    public function successPage()
    {
        $title = 'Success Page';
        return View::make('member.success', compact('title'));
    }

    public function register()
    {
        // Using Auth::attempt, no need for password to be hash
        $rules = [
            'first_name'            =>  'required|min:2',
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
                'errors' => $validation->messages()
            ]);
        }
        else
        {
            $firstName = Input::get('first_name');
            $lastName = Input::get('last_name');
            $mobileNumber = Input::get('mobile_number');
            $email = Input::get('email');
            $password = Input::get('password');

            // Activation code
            $code = str_random(60);

            $user = User::create([
                'first_name'    =>  $firstName,
                'last_name'     =>  $lastName,
                'mobile_number' =>  '+63' . substr($mobileNumber, 1),
                'email'         =>  $email,
                'password'      =>  Hash::make($password),
                'admin'         =>  2,
                'code'          =>  $code,
                'active'        =>  0
            ]);

            if ($user)
            {
                // Send email
                Mail::send('emails.auth.activate',
                    ['link' => URL::to('activate-account', $code), 'fullName' => $user->first_name . ' ' . $user->last_name],
                    function($message) use ($user) {
                        $message->to($user->email, $user->first_name . ' ' . $user->last_name)
                                ->subject('Activate your account');
                });

                return Response::json([
                    'success' => true,
                    'message' => 'Your account has been created! We have sent you an email to activate your account.'
                ]);
            }
        }
    }

    public function activateAccount($code)
    {
        $user = User::where('code', $code)->where('active', 0)->get();

        if ($user->count())
        {
            $user = $user->first();

            // Update user to active state
            $user->active = 1;
            $user->code = '';

            if ( $user->save() )
            {
                return Redirect::to('activate-message')
                        ->withMessage('Activated! You can now sign in!');
            }
        }

        return Redirect::to('activate-message')
                ->withError('We could not activate your account. Try again later.');
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