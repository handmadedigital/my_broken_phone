<?php namespace ThreeAccents\Auth\Handlers;

use ThreeAccents\Auth\Commands\UserRegisterCommand;
use ThreeAccents\Auth\Events\UserWasRegistered;
use ThreeAccents\Users\Entities\User;
use ThreeAccents\Users\Repositories\UserRepository;

class UserRegisterCommandHandler
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function handle(UserRegisterCommand $command)
    {
        $user = User::register($command->username, $command->email, $command->first_name, $command->last_name, $command->password, $command->slug);

        $persisted_user = $this->userRepo->persist($user);

        event(new UserWasRegistered($persisted_user));
    }
}