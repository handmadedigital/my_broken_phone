<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\PhoneCarrier;

class PhoneCarrierRepository extends EloquentRepository
{
    protected $model;

    function __construct(PhoneCarrier $model)
    {
        $this->model = $model;
    }
}