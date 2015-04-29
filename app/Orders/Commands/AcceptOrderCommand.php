<?php namespace ThreeAccents\Orders\Commands;

class AcceptOrderCommand
{
    public $order_id;

    function __construct($order_id)
    {
        $this->order_id = $order_id;
    }
}