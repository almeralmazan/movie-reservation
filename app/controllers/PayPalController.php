<?php

class PayPalController extends BaseController {

    protected $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->setUsername('csc_api1.csc-app.info');
        $this->gateway->setPassword('1407734273');
        $this->gateway->setSignature('A4iCcjpHlJ2GLA7UgerFhkvlf6GqATQIaHnfHdoppyhFVRDK-sVJz3K1');
        $this->gateway->setTestMode(true);
    }
}