<?php namespace ThreeAccents\Users\Events;

use ThreeAccents\Users\Entities\UserDetail;

class UserDetailsWasAdded
{
    protected $userDetail;

    function __construct(UserDetail $userDetail)
    {
        $this->userDetail = $userDetail;
    }
}