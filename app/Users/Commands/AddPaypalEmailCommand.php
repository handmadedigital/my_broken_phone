<?php namespace ThreeAccents\Users\Commands;

class AddPaypalEmailCommand
{
    public $paypal_email;

    function __construct($paypal_email)
    {
        $this->paypal_email = $paypal_email;
    }
}