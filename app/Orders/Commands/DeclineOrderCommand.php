<?php namespace ThreeAccents\Orders\Commands;

class DeclineOrderCommand
{
    public $order_id;

    function __construct($order_id)
    {
        $this->order_id = $order_id;
    }
}