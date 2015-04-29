<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\PhoneCapacity;

class PhoneCapacityRepository extends EloquentRepository
{
    protected $model;

    function __construct(PhoneCapacity $model)
    {
        $this->model = $model;
    }
}