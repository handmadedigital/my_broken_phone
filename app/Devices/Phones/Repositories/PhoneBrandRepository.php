<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\PhoneBrand;

class PhoneBrandRepository extends EloquentRepository
{
    protected $model;

    function __construct(PhoneBrand $model)
    {
        $this->model = $model;
    }
}