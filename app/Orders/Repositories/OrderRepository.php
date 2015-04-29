<?php namespace ThreeAccents\Orders\Repositories;

use Illuminate\Contracts\Auth\Guard;
use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Orders\Entities\Order;

class OrderRepository extends EloquentRepository
{
    /**
     * @var Order
     */
    protected $model;

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @param Order $model
     * @param Guard $auth
     */
    function __construct(Order $model, Guard $auth)
    {
        $this->model = $model;
        $this->auth = $auth;
    }


    /***************************/
    /*
     * GETTERS
     */
    /***************************/

    /**
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByUserId($user_id)
    {
        return $this->model->with('user', 'status', 'payment_method', 'phone')->where('user_id', '=', $user_id)->latest()->get();
    }

    /**
     * @param $order_number
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getOrderByOrderNumber($order_number)
    {
        return $this->model->with('user', 'status', 'payment_method', 'phone')->where('order_number', '=', $order_number)->first();
    }

    /**
     * @return mixed
     */
    public function getLatest()
    {
        return $this->model->with('user', 'status', 'payment_method', 'phone')->latest()->get();
}





    /***************************/
    /*
     * SETTERS
     */
    /***************************/

    /**
     * @param $order
     */
    public function persist($order)
    {
        $this->model->phone_id = $order->phone_id;
        $this->model->user_id = $this->auth->user()->id;
        $this->model->order_number = rand(10000, 99999);
        $this->model->payment_method_id = $order->payment_method_id;
        $this->model->status_id = 1;

        $this->model->save();

        return $this->model;
    }

    /**
     * @param $order
     * @return mixed
     */
    public function setPrice($order)
    {
        $db_order = $this->getById($order->id);

        $db_order->price = $order->price;
        $db_order->status_id = 2;

        $db_order->save();

        return $db_order;
    }

    /**
     * @param $order
     */
    public function accept($order)
    {
        $db_order = $this->getById($order->id);

        $db_order->status_id = 4;

        $db_order->save();

        return $db_order;
    }

    /**
     * @param $order
     */
    public function decline($order)
    {
        $db_order = $this->getById($order->id);

        $db_order->status_id = 3;

        $db_order->save();

        return $db_order;
    }
}