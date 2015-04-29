<?php namespace ThreeAccents\Orders\Listeners;

use ThreeAccents\Tools\Mailer\Orders\OrderMailer;

abstract class AbstractOrderListener
{
    protected $orderMailer;

    function __construct(OrderMailer $orderMailer)
    {
        $this->orderMailer = $orderMailer;
    }
}