<?php namespace ThreeAccents\Devices\Phones\Services;

use ThreeAccents\Devices\Phones\Repositories\PhoneBrandRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneCapacityRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneCarrierRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneConditionRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneModelRepository;
use ThreeAccents\Devices\Phones\Repositories\PhoneRepository;

class BuyPhoneService extends PhoneService
{
    /**
     * @var PhoneCarrierRepository
     */
    protected $carrierRepo;

    /**
     * @var PhoneRepository
     */
    protected  $phoneRepo;

    /**
     * @var PhoneBrandRepository
     */
    protected $brandRepo;

    /**
     * @var PhoneModelRepository
     */
    protected $modelRepo;

    /**
     * @var PhoneCapacityRepository
     */
    protected $capacityRepo;

    /**
     * @var PhoneConditionRepository
     */
    protected $conditionRepo;

    function __construct(
        PhoneCarrierRepository $carrierRepo,
        PhoneRepository $phoneRepo,
        PhoneBrandRepository $brandRepo,
        PhoneModelRepository $modelRepo,
        PhoneCapacityRepository $capacityRepo,
        PhoneConditionRepository $conditionRepo
    )
    {
        $this->carrierRepo = $carrierRepo;
        $this->phoneRepo = $phoneRepo;
        $this->brandRepo = $brandRepo;
        $this->modelRepo = $modelRepo;
        $this->capacityRepo = $capacityRepo;
        $this->conditionRepo = $conditionRepo;
    }

    /**
     * retrieve all the carriers
     *
     * @return mixed
     */
    public function getCarriers()
    {
        return $this->carrierRepo->getAll();
    }

    /**
     * Retrieve all the brands belonging to the above
     * selected carrier
     *
     * @param $carrier_slug
     * @return mixed
     */
    public function getBrands($carrier_slug)
    {
        $carrier = $this->carrierRepo->getBySlug($carrier_slug);

        $brands = $this->phoneRepo->getBrandsFromCarrierId($carrier->id);

        $brand_ids = $this->filterIds($brands, 'brand_id');

        return $this->brandRepo->getFromIds($brand_ids);
    }

    /**
     * @param $carrier_slug
     * @param $brand_slug
     * @return mixed
     */
    public function getModels($carrier_slug, $brand_slug)
    {
        $carrier = $this->carrierRepo->getBySlug($carrier_slug);
        $brand = $this->brandRepo->getBySlug($brand_slug);

        $models = $this->phoneRepo->getBuyModels($carrier->id, $brand->id);

        $model_ids = $this->filterIds($models, 'model_id');

        return $this->modelRepo->getFromIds($model_ids);
    }

    /**
     * @param $carrier_slug
     * @param $brand_slug
     * @param $model_slug
     * @return null
     */
    public function getCapacityIds($carrier_slug, $brand_slug, $model_slug)
    {
        $carrier = $this->carrierRepo->getBySlug($carrier_slug);
        $brand = $this->brandRepo->getBySlug($brand_slug);
        $model = $this->modelRepo->getBySlug($model_slug);

        $capacities = $this->phoneRepo->getBuyCapacities($carrier->id, $brand->id, $model->id);

        $capacity_ids = $this->filterIds($capacities, 'capacity_id');

        if( ! $this->hasCapacity($capacity_ids)) return null;

        return $capacity_ids;
    }

    /**
     * @param $carrier_slug
     * @param $brand_slug
     * @param $model_slug
     * @param $capacity_slug
     * @return mixed
     */
    public function getConditions($carrier_slug, $brand_slug, $model_slug, $capacity_slug)
    {
        $carrier = $this->carrierRepo->getBySlug($carrier_slug);
        $brand = $this->brandRepo->getBySlug($brand_slug);
        $model = $this->modelRepo->getBySlug($model_slug);
        $capacity = $this->capacityRepo->getBySlug($capacity_slug);

        $conditions = $this->phoneRepo->getBuyConditions($carrier->id, $brand->id, $model->id, $capacity->id);

        $condition_ids = $this->filterIds($conditions, 'condition_id');

        return $this->conditionRepo->getFromIds($condition_ids);
    }

    /**
     * @param $carrier_slug
     * @param $brand_slug
     * @param $model_slug
     * @param $capacity_slug
     * @param $condition_slug
     * @return mixed
     */
    public function getPrice($carrier_slug, $brand_slug, $model_slug, $capacity_slug, $condition_slug)
    {
        $carrier = $this->carrierRepo->getBySlug($carrier_slug);
        $brand = $this->brandRepo->getBySlug($brand_slug);
        $model = $this->modelRepo->getBySlug($model_slug);
        $capacity = $this->capacityRepo->getBySlug($capacity_slug);
        $condition = $this->conditionRepo->getBySlug($condition_slug);

        $phone = $this->phoneRepo->getPhone($carrier->id, $brand->id, $model->id, $capacity->id, $condition->id);

        return $phone;
    }
}