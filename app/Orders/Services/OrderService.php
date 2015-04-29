<?php namespace ThreeAccents\Orders\Services;

class OrderService
{
    public function getOrder($order_number)
    {
        return $this->orderRepo->getOrderByOrderNumber($order_number);
    }
}