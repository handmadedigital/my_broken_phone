<?php namespace ThreeAccents\Users\Commands;

class AddUserDetailCommand
{
    public $address;
    public $user_id;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $paypal_email;

    function __construct($address, $user_id, $city, $state, $zip, $country, $paypal_email = null)
    {
        $this->address = $address;
        $this->user_id = $user_id;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->country = $country;
        $this->paypal_email = $paypal_email;
    }
}