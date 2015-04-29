<?php namespace ThreeAccents\Auth\Events;

use ThreeAccents\Users\Entities\User;

class UserWasRegistered
{
    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
}