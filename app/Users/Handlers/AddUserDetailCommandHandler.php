<?php namespace ThreeAccents\Users\Handlers;

use ThreeAccents\Users\Commands\AddUserDetailCommand;
use ThreeAccents\Users\Entities\UserDetail;
use ThreeAccents\Users\Events\UserDetailsWasAdded;
use ThreeAccents\Users\Repositories\UserDetailRepository;

class AddUserDetailCommandHandler
{
    /**
     * @var UserDetailRepository
     */
    protected $userDetailsRepo;

    function __construct(UserDetailRepository $userDetailsRepo)
    {
        $this->userDetailsRepo = $userDetailsRepo;
    }

    public function handle(AddUserDetailCommand $command)
    {
        $user_details = UserDetail::addDetails($command->user_id, $command->address, $command->city, $command->state, $command->country, $command->zip, $command->paypal_email);

        $this->userDetailsRepo->persist($user_details);

        event(new UserDetailsWasAdded($user_details));
    }
}