<?php namespace ThreeAccents\Orders\Listeners;

use ThreeAccents\Orders\Events\OrderWasDeclined;

class UserDeclinedOrderListener extends AbstractOrderListener
{
    public function sendUserDeclinedOrderEmail(OrderWasDeclined $event)
    {
        $this->orderMailer->sendAdminUserOrderDecision($event->order);
    }
}