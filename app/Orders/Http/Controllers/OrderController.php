<?php namespace ThreeAccents\Orders\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\Controller;
use ThreeAccents\Orders\Commands\AcceptOrderCommand;
use ThreeAccents\Orders\Commands\DeclineOrderCommand;
use ThreeAccents\Orders\Commands\PlaceOrderCommand;
use ThreeAccents\Orders\Http\Requests\AcceptOrderRequest;
use ThreeAccents\Tools\Mailer\Orders\OrderMailer;

class OrderController extends Controller
{
    protected $mailer;

    function __construct(OrderMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function postAddOrder()
    {
        $order = $this->dispatch(PlaceOrderCommand::class);

        $this->mailer->sendAdminOrderWasPlaced($order);
        $this->mailer->sendUserOrderConfirmation($order);

        flash()->message('Order has been placed!');

        return redirect()->route('buy.thank.you');
    }

    public function postAcceptOrder(AcceptOrderRequest $request)
    {
        $order = $this->dispatch(AcceptOrderCommand::class);

        $this->mailer->sendAdminUserOrderDecision($order);

        flash()->message('Order has been accepted! Please check your email for further instructions');

        return redirect()->back();
    }

    public function postDeclineOrder(AcceptOrderRequest $request)
    {
        $order = $this->dispatch(DeclineOrderCommand::class);

        $this->mailer->sendAdminUserOrderDecision($order);

        flash()->message('Order has been declined! Please check your email for further instructions');

        return redirect()->back();
    }
}