<?php namespace ThreeAccents\Users\Repositories;

use Illuminate\Contracts\Auth\Guard;
use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Users\Entities\UserDetail;

class UserDetailRepository extends EloquentRepository
{
    /**
     * @var UserDetail
     */
    protected $model;

    /**
     * @var Guard
     */
    protected $auth;

    function __construct(UserDetail $model, Guard $auth)
    {
        $this->model = $model;
        $this->auth = $auth;
    }

    public function persist($details)
    {
        $this->model->user_id = $details->user_id;
        $this->model->address = $details->address;
        $this->model->city = $details->city;
        $this->model->state = $details->state;
        $this->model->zip = $details->zip;
        $this->model->country = $details->country;
        $this->model->paypal_email = $details->paypal_email;

        $this->model->save();
    }

    /**
     * @param $paypal_email
     */
    public function addPaypalEmail($paypal_email)
    {
        $user_details = $this->model->where('user_id', '=', $this->auth->user()->id)->first();

        $user_details->paypal_email = $paypal_email;

        $user_details->save();
    }

}