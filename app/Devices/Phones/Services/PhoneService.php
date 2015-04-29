<?php namespace ThreeAccents\Devices\Phones\Services;

abstract class PhoneService
{
    /**
     * @param $capacity_ids
     * @return bool
     */
    public function hasCapacity($capacity_ids)
    {
        foreach($capacity_ids as $capacity)
        {
            if($capacity != 1) return true;
        }

        return false;
    }

    /**
     * @param $ids
     * @param $model
     * @return array
     */
    public function filterIds($ids, $model)
    {
        $filtered_ids = [];

        foreach($ids as $id)
        {
            if( ! in_array($id->$model, $filtered_ids)) $filtered_ids[] = $id->$model;
        }

        return $filtered_ids;
    }
}