<?php namespace ThreeAccents\Tools\Mailer\Orders;

use ThreeAccents\Tools\Mailer\MailerTool;

class OrderMailer extends MailerTool
{
    public function sendAdminOrderWasPlaced($order)
    {
        $this->sendLater(env('ADMIN_EMAIL'), 'New order was placed!', 'emails.orders.admin.order-placed', [
            'order_number' => $order->order_number,
            'username' => $order->user->username,
            'carrier' => $order->phone->carrier->name,
            'brand' => $order->phone->brand->name,
            'model' => $order->phone->model->name,
            'condition' => $order->phone->condition->name,
            'capacity' => $order->phone->capacity->name,
            'quote' => $order->phone->price
        ]);
    }

    public function sendUserOrderConfirmation($order)
    {
        $this->sendLater($order->user->email, 'Order confirmation', 'emails.orders.user.confirmation', [
            'order_number' => $order->order_number,
            'username' => $order->user->username,
            'carrier' => $order->phone->carrier->name,
            'brand' => $order->phone->brand->name,
            'model' => $order->phone->model->name,
            'condition' => $order->phone->condition->name,
            'capacity' => $order->phone->capacity->name,
            'quote' => $order->phone->price
        ]);
    }

    public function sendUserOrderNextStep($order)
    {
        $this->sendLater($order->user->email, 'Next steps', 'emails.orders.user.next-steps', [
            'order_number' => $order->order_number,
            'username' => $order->user->username,
            'carrier' => $order->phone->carrier->name,
            'brand' => $order->phone->brand->name,
            'model' => $order->phone->model->name,
            'condition' => $order->phone->condition->name,
            'capacity' => $order->phone->capacity->name,
            'quote' => $order->phone->price
        ]);
    }

    public function sendUserOrderPrice($order)
    {
        $this->sendLater($order->user->email, 'Official Price', 'emails.orders.user.price', [
            'price' => $order->price
        ]);
    }

    public function sendAdminUserOrderDecision($order)
    {
        $this->sendLater(env('ADMIN_EMAIL'), 'Order was decided', 'emails.orders.admin.order-decision', [
            'decision' => $order->status->name
        ]);
    }
}