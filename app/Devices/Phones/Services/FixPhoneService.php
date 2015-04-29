<?php namespace ThreeAccents\Devices\Phones\Services;

use ThreeAccents\Devices\Phones\Repositories\PhoneBrandRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneModelRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneProblemRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneRepository;

class FixPhoneService extends PhoneService
{
    /**
     * @var PhoneBrandRepository
     */
    protected $brandRepo;

    /**
     * @var PhoneModelRepository
     */
    protected $modelRepo;

    /**
     * @var PhoneProblemRepository
     */
    protected $problemRepo;

    /**
     * @var PhoneRepository
     */
    private $phoneRepo;

    /**
     * @param PhoneBrandRepository $brandRepo
     * @param PhoneModelRepository $modelRepo
     * @param PhoneRepository $phoneRepo
     * @param PhoneProblemRepository $problemRepo
     */
    function __construct(
        PhoneBrandRepository $brandRepo,
        PhoneModelRepository $modelRepo,
        PhoneRepository $phoneRepo,
        PhoneProblemRepository $problemRepo
    )
    {
        $this->brandRepo = $brandRepo;
        $this->modelRepo = $modelRepo;
        $this->phoneRepo = $phoneRepo;
        $this->problemRepo = $problemRepo;
    }

    /**
     * @return mixed
     */
    public function getBrands()
    {
        $brands = $this->brandRepo->getAll();

        return $brands;
    }

    /**
     * @param $brand_slug
     * @return mixed
     */
    public function getModels($brand_slug)
    {
        $brand = $this->brandRepo->getBySlug($brand_slug);

        $models = $this->phoneRepo->getFixModels($brand->id);

        $model_ids = $this->filterIds($models, 'model_id');

        return $this->modelRepo->getFromIds($model_ids);
    }

    /**
     * @param $model_slug
     * @return mixed
     */
    public function getModel($model_slug)
    {
        $model = $this->modelRepo->getBySlug($model_slug);

        return $model;
    }

    public function getProblemIds($model_slug)
    {
        $model = $this->getModel($model_slug);

        $problem_ids = [];

        foreach($model->problems as $problem)
        {
            if( ! in_array($problem->id, $problem_ids))
            {
                $problem_ids[] = $problem->id;
            }
        }

        return $problem_ids;
    }

    public function getPrice($model_slug, $problem_slug)
    {
        $model = $this->modelRepo->getBySlug($model_slug);

        $problem_ids = [];

        foreach($problem_slug[0] as $slug)
        {
            $problem = $this->problemRepo->getBySlug($slug);
            $problem_ids[] = $problem->id;
        }

        $problem_models = $model->problems()->whereIn('phone_problem_id', $problem_ids)->get();

        return $problem_models;

    }
}