<?php namespace ThreeAccents\Orders\Services;

use ThreeAccents\Orders\Repositories\OrderRepository;
use ThreeAccents\Users\Repositories\UserRepository;

class UserOrderService extends OrderService
{
    /**
     * @var OrderRepository
     */
    protected $orderRepo;

    /**
     * @var UserRepository
     */
    protected  $userRepo;

    function __construct(OrderRepository $orderRepo, UserRepository $userRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->userRepo = $userRepo;
    }

    public function getOrders($user_slug)
    {
        $user = $this->userRepo->getBySlug($user_slug);

        return $this->orderRepo->getByUserId($user->id);
    }
}