<?php namespace ThreeAccents\Users\Repositories;

use Illuminate\Support\Facades\Hash;
use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Users\Entities\User;

class UserRepository extends EloquentRepository
{
    protected $model;

    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function persist($user)
    {
        $this->model->username = $user->username;
        $this->model->slug = $user->slug;
        $this->model->first_name = $user->first_name;
        $this->model->last_name = $user->last_name;
        $this->model->email = $user->email;
        $this->model->password = Hash::make($user->password);

        $this->model->save();

        return $this->model;
    }
}