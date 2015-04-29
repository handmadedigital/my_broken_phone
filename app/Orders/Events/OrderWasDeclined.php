<?php namespace ThreeAccents\Orders\Events;

use ThreeAccents\Orders\Entities\Order;

class OrderWasDeclined
{
    public $order;

    function __construct(Order $order)
    {
        $this->order = $order;
    }
}