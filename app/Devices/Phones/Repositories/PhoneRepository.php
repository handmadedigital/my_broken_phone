<?php namespace ThreeAccents\Devices\Phones\Repositories;

use ThreeAccents\Core\Repositories\EloquentRepository;
use ThreeAccents\Devices\Phones\Entities\Phone;

class PhoneRepository extends EloquentRepository
{
    protected $model;

    function __construct(Phone $model)
    {
        $this->model = $model;
    }



    /**************************/
    /*
     * GETTERS FOR BUY PHONES
     */
    /**************************/

    /**
     * @param $carrier_id
     * @return mixed
     */
    public function getBrandsFromCarrierId($carrier_id)
    {
        return $this->model->select('brand_id', 'carrier_id')->where('carrier_id', '=', $carrier_id)->get();
    }

    /**
     * @param $carrier_id
     * @param $brand_id
     * @return mixed
     */
    public function getBuyModels($carrier_id, $brand_id)
    {
        return $this->model->select('brand_id', 'carrier_id', 'model_id')
            ->where('carrier_id', '=', $carrier_id)
            ->where('brand_id', '=', $brand_id)
            ->get();
    }

    /**
     * @param $carrier_id
     * @param $brand_id
     * @param $model_id
     * @return mixed
     */
    public function getBuyCapacities($carrier_id, $brand_id, $model_id)
    {
        return $this->model->select('brand_id', 'carrier_id', 'model_id', 'capacity_id')
            ->where('carrier_id', '=', $carrier_id)
            ->where('brand_id', '=', $brand_id)
            ->where('model_id', '=', $model_id)
            ->get();
    }

    /**
     * @param $carrier_id
     * @param $brand_id
     * @param $model_id
     * @param $capacity_id
     * @return mixed
     */
    public function getBuyConditions($carrier_id, $brand_id, $model_id, $capacity_id)
    {
        return $this->model->select('brand_id', 'carrier_id', 'model_id', 'capacity_id', 'condition_id')
            ->where('carrier_id', '=', $carrier_id)
            ->where('brand_id', '=', $brand_id)
            ->where('model_id', '=', $model_id)
            ->where('capacity_id', '=', $capacity_id)
            ->get();
    }



    /**************************/
    /*
     * GETTERS FOR FIX PHONES
     */
    /**************************/

    /**
     * @param $brand_id
     * @return mixed
     */
    public function getFixModels($brand_id)
    {
        return $this->model->select('brand_id', 'model_id')->where('brand_id', '=', $brand_id)->get();
    }

    /**
     * @param $carrier_id
     * @param $brand_id
     * @param $model_id
     * @param $capacity_id
     * @param $condition_id
     * @return mixed
     */
    public function getPhone($carrier_id, $brand_id, $model_id, $capacity_id, $condition_id)
    {
        return $this->model->select('id', 'brand_id', 'carrier_id', 'model_id', 'capacity_id', 'condition_id', 'price')
            ->with('model', 'condition', 'capacity')
            ->where('carrier_id', '=', $carrier_id)
            ->where('brand_id', '=', $brand_id)
            ->where('model_id', '=', $model_id)
            ->where('capacity_id', '=', $capacity_id)
            ->where('condition_id', '=', $condition_id)
            ->first();
    }
}