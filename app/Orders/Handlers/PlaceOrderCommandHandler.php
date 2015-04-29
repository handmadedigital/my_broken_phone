<?php namespace ThreeAccents\Orders\Handlers;

use ThreeAccents\Orders\Commands\PlaceOrderCommand;
use ThreeAccents\Orders\Entities\Order;
use ThreeAccents\Orders\Events\OrderWasPlaced;
use ThreeAccents\Orders\Repositories\OrderRepository;

class PlaceOrderCommandHandler
{
    /**
     * @var OrderRepository
     */
    protected $orderRepo;

    function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function handle(PlaceOrderCommand $command)
    {
        $order = Order::place($command->phone_id, $command->payment_method);

        return $persisted_order = $this->orderRepo->persist($order);

        //event(new OrderWasPlaced($persisted_order));
    }
}