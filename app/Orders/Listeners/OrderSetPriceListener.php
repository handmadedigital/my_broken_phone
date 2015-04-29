<?php namespace ThreeAccents\Orders\Listeners;

use ThreeAccents\Orders\Events\OrderPriceWasSet;

class OrderSetPriceListener extends AbstractOrderListener
{
    public function sendUserOrderPriceEmail(OrderPriceWasSet $event)
    {
        $this->orderMailer->sendUserOrderPrice($event->order);
    }
}