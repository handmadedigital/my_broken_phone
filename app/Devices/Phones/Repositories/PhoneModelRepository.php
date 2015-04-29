<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\PhoneModel;

class PhoneModelRepository extends EloquentRepository
{
    protected $model;

    function __construct(PhoneModel $model)
    {
        $this->model = $model;
    }
}