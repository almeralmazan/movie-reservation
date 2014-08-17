<?php

use \Omnipay\Omnipay;

class PayPalController extends BaseController {

    protected $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->setUsername('emoviereservation_api1.gmail.com');
        $this->gateway->setPassword('1408010544');
        $this->gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31AjWcElQKJD7a9rlcEkpAe57KpyDg');
        $this->gateway->setTestMode(true);
    }

    public function reservedSeat()
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
                'customer_status'   =>  'member-paypal',
                'transaction_id'    =>  $transactionCount + 1,
                'seat_number'       =>  $reservedSeats[$i],
                'cinema_id'         =>  $cinemaId,
                'time_id'           =>  $selectedTime
            ]);
        }

        Transaction::create([
            'transaction_number'    =>  Input::get('token'),
            'receipt_number'        =>  $transactionCount + 1,
            'tickets_bought'        =>  $ticketsQuantity,
            'burger_bought'         =>  $burgerQuantity,
            'fries_bought'          =>  $friesQuantity,
            'soda_bought'           =>  $sodaQuantity,
            'total'                 =>  $totalPrice,
            'paid_status'           =>  1
        ]);

        // store walkin name in session
        Session::put('customer_name', $memberName);

        return Response::json([
            'transactionId' =>  ($transactionCount + 1)
        ]);
    }

    public function buyWithPayPal()
    {
        $user = User::find(Session::get('user_id'));

        if ( isset($user) )
        {
            $response = $this->gateway->purchase([
                'cancelUrl'     =>  getenv('DOMAIN_NAME') . 'cancel-payment',
                'returnUrl'     =>  getenv('DOMAIN_NAME') . 'success-payment/' . $user->id,
                'description'   =>  'E-Movie Reservation Transaction',
                'amount'        =>  '820.00',
                'currency'      =>  'PHP'
            ])->send();

            $response->redirect();
        }
        else
        {
            return Redirect::back()->withMessage('Control # does not exist. Try again.');
        }

    }

    public function successPayment($applicantId)
    {
        $transactionNumber = Input::get('token');
        // Make this customize using DB::table('applicants')
        $applicant = Applicant::find($applicantId);
        $applicant->paid_status = 1;
        $applicant->save();

        $payment = Payment::find($applicantId);
        $payment->transaction_number = $transactionNumber;
        $payment->paid_date = date('Y-m-d');
        $payment->save();

        $testing = DB::table('testing_centers')
            ->select('testing_centers.location')
            ->where('testing_centers.id', $applicant->testing_centers_location_id)
            ->first();

        $title = 'Success Payment Page';
        return View::make('paypal.success-payment', compact('title', 'transactionNumber', 'applicant', 'testing'));
    }
}