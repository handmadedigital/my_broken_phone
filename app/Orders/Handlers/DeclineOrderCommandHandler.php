<?php namespace ThreeAccents\Orders\Handlers;

use ThreeAccents\Orders\Commands\DeclineOrderCommand;
use ThreeAccents\Orders\Entities\Order;
use ThreeAccents\Orders\Events\OrderWasDeclined;
use ThreeAccents\Orders\Repositories\OrderRepository;

class DeclineOrderCommandHandler
{
    /**
     * @var OrderRepository
     */
    protected $orderRepo;

    /**
     * @param OrderRepository $orderRepo
     */
    function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    /**
     * @param DeclineOrderCommand $command
     */
    public function handle(DeclineOrderCommand $command)
    {
        $order = Order::decline($command->order_id);

        return $this->orderRepo->decline($order);

        //event(new OrderWasDeclined($order));
    }
}