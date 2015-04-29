<?php namespace ThreeAccents\Orders\Handlers;

use ThreeAccents\Orders\Commands\SetOrderPriceCommand;
use ThreeAccents\Orders\Entities\Order;
use ThreeAccents\Orders\Events\OrderPriceWasSet;
use ThreeAccents\Orders\Repositories\OrderRepository;

class SetOrderPriceCommandHandler
{
    /**
     * @var OrderRepository
     */
    protected $orderRepo;

    function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function handle(SetOrderPriceCommand $command)
    {
        $order = Order::setPrice($command->order_id, $command->price);

        return $this->orderRepo->setPrice($order);

        //event(new OrderPriceWasSet($db_order));
    }
}