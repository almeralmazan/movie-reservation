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
            'transaction_number'    =>  '',
            'receipt_number'        =>  $transactionCount + 1,
            'tickets_bought'        =>  $ticketsQuantity,
            'burger_bought'         =>  $burgerQuantity,
            'fries_bought'          =>  $friesQuantity,
            'soda_bought'           =>  $sodaQuantity,
            'total'                 =>  $totalPrice,
            'paid_status'           =>  0
        ]);

        // i don't know what is this
        Session::put('customer_name', $memberName);

        return Response::json([
            'transactionId' =>  ($transactionCount + 1),
            'totalPrice'    =>  $totalPrice
        ]);
    }

    public function buyWithPayPal($transactionId, $totalPrice)
    {
        $response = $this->gateway->purchase([
            'cancelUrl'     =>  getenv('DOMAIN_NAME') . 'member/cancel-payment',
            'returnUrl'     =>  getenv('DOMAIN_NAME') . 'member/success-payment/' . (int)$transactionId,
            'description'   =>  'E-Movie Reservation Transaction',
            'amount'        =>  $totalPrice + '.00',
            'currency'      =>  'PHP'
        ])->send();

        $response->redirect();
    }

    public function successPayment($transactionId)
    {
        $transactionNumber = Input::get('token');

        $transaction = Transaction::find($transactionId);
        $transaction->transaction_number = $transactionNumber;
        $transaction->paid_status = 1;
        $transaction->save();

        return Redirect::to('member/receipt-ticket/' . $transactionId);
    }
}
