<?php namespace ThreeAccents\Orders\Commands;

class SetOrderPriceCommand
{
    public $order_id;
    public $price;

    function __construct($order_id, $price)
    {
        $this->order_id = $order_id;
        $this->price = $price;
    }
}