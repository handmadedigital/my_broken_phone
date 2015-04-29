<?php namespace ThreeAccents\Orders\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\Controller;
use ThreeAccents\Orders\Services\UserOrderService;

class UserOrderController extends Controller
{
    /**
     * @var UserOrderService
     */
    protected $orderService;

    function __construct(UserOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrders($user_slug)
    {
        $orders = $this->orderService->getOrders($user_slug);

        return view('orders.user.orders', compact('orders'));
    }

    public function getOrder($user_slug, $order_number)
    {
        $order = $this->orderService->getOrder($order_number);

        return view('orders.user.order', compact('order'));
    }
}