<?php namespace ThreeAccents\Orders\Listeners;

use ThreeAccents\Orders\Events\OrderWasAccepted;

class UserAcceptedOrderListener extends AbstractOrderListener
{
    public function sendAdminUserAcceptedOrderEmail(OrderWasAccepted $event)
    {
        $this->orderMailer->sendAdminUserOrderDecision($event->order);
    }
}