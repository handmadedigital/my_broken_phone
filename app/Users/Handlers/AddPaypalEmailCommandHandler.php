<?php namespace ThreeAccents\Users\Handlers;

use ThreeAccents\Users\Commands\AddPaypalEmailCommand;
use ThreeAccents\Users\Repositories\UserDetailRepository;

class AddPaypalEmailCommandHandler
{
    /**
     * @var UserDetailRepository
     */
    protected $userDetailsRepo;

    /**
     * @param UserDetailRepository $userDetailsRepo
     */
    function __construct(UserDetailRepository $userDetailsRepo)
    {
        $this->userDetailsRepo = $userDetailsRepo;
    }

    /**
     * @param AddPaypalEmailCommand $command
     */
    public function handle(AddPaypalEmailCommand $command)
    {
        $this->userDetailsRepo->addPaypalEmail($command->paypal_email);
    }
}