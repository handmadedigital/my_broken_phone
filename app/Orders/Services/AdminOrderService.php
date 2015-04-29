<?php namespace ThreeAccents\Orders\Services;

use ThreeAccents\Orders\Repositories\OrderRepository;

class AdminOrderService extends OrderService
{
    protected $orderRepo;

    function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getOrders()
    {
        return $this->orderRepo->getLatest();
    }
}