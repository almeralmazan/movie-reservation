<?php

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

    public function buyWithPayPal()
    {
        $applicant = DB::table('applicants')
                        ->select('applicants.id', 'applicants.new_exam_level', 'applicants.controlno')
                        ->where('controlno', Input::get('controlNumber'))
                        ->first();

        if ( isset($applicant) )
        {
            $response = $this->gateway->purchase([
                'cancelUrl'     =>  getenv('DOMAIN_NAME') . 'cancel-payment',
                'returnUrl'     =>  getenv('DOMAIN_NAME') . 'success-payment/' . $applicant->id,
                'description'   =>  '',
                'amount'        =>  '',
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