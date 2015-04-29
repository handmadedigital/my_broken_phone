<?php namespace ThreeAccents\Orders\Commands;

class PlaceOrderCommand
{
    public $phone_id;
    public $payment_method;

    function __construct($phone_id, $payment_method)
    {
        $this->phone_id = $phone_id;
        $this->payment_method = $payment_method;
    }
}