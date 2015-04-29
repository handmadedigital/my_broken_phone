<?php namespace ThreeAccents\Orders\Listeners;

use ThreeAccents\Orders\Events\OrderWasPlaced;

class OrderPlacingListener extends AbstractOrderListener
{
    public function sendAdminOrderWasPlacedEmails(OrderWasPlaced $event)
    {
        $this->orderMailer->sendAdminOrderWasPlaced($event->order);
        $this->orderMailer->sendUserOrderConfirmation($event->order);
        $this->orderMailer->sendUserOrderNextStep($event->order);
    }
}