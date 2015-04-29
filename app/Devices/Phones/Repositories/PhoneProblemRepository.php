<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\PhoneProblem;

class PhoneProblemRepository extends EloquentRepository
{
    protected $model;

    function __construct(PhoneProblem $model)
    {
        $this->model = $model;
    }
}