<?php namespace ThreeAccents\Orders\Handlers;

use ThreeAccents\Orders\Commands\AcceptOrderCommand;
use ThreeAccents\Orders\Entities\Order;
use ThreeAccents\Orders\Events\OrderWasAccepted;
use ThreeAccents\Orders\Repositories\OrderRepository;

class AcceptOrderCommandHandler
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
     * @param AcceptOrderCommand $command
     */
    public function handle(AcceptOrderCommand $command)
    {
        $order = Order::accept($command->order_id);

        $db_order = $this->orderRepo->accept($order);

        //event(new OrderWasAccepted($order));

        return $db_order;
    }
}