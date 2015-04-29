<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\PhoneCondition;

class PhoneConditionRepository extends EloquentRepository
{
    protected $model;

    function __construct(PhoneCondition $model)
    {
        $this->model = $model;
    }
}