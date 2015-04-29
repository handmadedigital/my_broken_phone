<?php namespace ThreeAccents\Auth\Listeners;

use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Input;
use ThreeAccents\Auth\Events\UserWasRegistered;
use ThreeAccents\Packages\CommandBus\CommandTrait;
use ThreeAccents\Users\Commands\AddUserDetailCommand;

class UserRegistrationListeners
{
    use CommandTrait;

    protected $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function addUserDetails(UserWasRegistered $event)
    {
        $input = Input::all();

        $this->dispatch(AddUserDetailCommand::class, [
            'user_id' => $event->user->id,
            'address' => $input['address'],
            'city' => $input['city'],
            'state' => $input['state'],
            'country' => $input['country'],
            'zip' => $input['zip'],
            'paypal_email' => $input['paypal_email'],
        ]);
    }

    public function logUserIn(UserWasRegistered $event)
    {
        $this->auth->login($event->user);
    }
}