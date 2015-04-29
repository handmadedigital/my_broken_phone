<?php namespace ThreeAccents\Orders\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\Controller;
use ThreeAccents\Orders\Commands\SetOrderPriceCommand;
use ThreeAccents\Orders\Http\Requests\SetOrderPriceRequest;
use ThreeAccents\Orders\Services\AdminOrderService;

class AdminOrderController extends Controller
{
    /**
     * @var AdminOrderService
     */
    protected $orderService;

    function __construct(AdminOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrders()
    {
        $orders = $this->orderService->getOrders();

        return view('orders.admin.orders', compact('orders'));
    }

    public function getOrder($order_number)
    {
        $order = $this->orderService->getOrder($order_number);

        return view('orders.admin.order', compact('order'));
    }

    public function postSetPrice(SetOrderPriceRequest $request)
    {
        $this->dispatch(SetOrderPriceCommand::class);

        flash()->message('Price has been set!');

        return redirect()->back();
    }
}