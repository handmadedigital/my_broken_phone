<?php namespace ThreeAccents\Orders\Events;

use ThreeAccents\Orders\Entities\Order;

class OrderPriceWasSet
{
    public $order;

    function __construct(Order $order)
    {
        $this->order = $order;
    }
}