<?php namespace ThreeAccents\Devices\Phones\Entities;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

	/***************************************/
	/*
     * Relationship Methods
     */
	/****************************************/

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function model()
	{
		return $this->belongsTo('ThreeAccents\Devices\Phones\Entities\PhoneModel', 'model_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function capacity()
	{
		return $this->belongsTo('ThreeAccents\Devices\Phones\Entities\PhoneCapacity', 'capacity_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function condition()
	{
		return $this->belongsTo('ThreeAccents\Devices\Phones\Entities\PhoneCondition', 'condition_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function carrier()
	{
		return $this->belongsTo('ThreeAccents\Devices\Phones\Entities\PhoneCarrier', 'carrier_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function brand()
	{
		return $this->belongsTo('ThreeAccents\Devices\Phones\Entities\PhoneBrand', 'brand_id');
	}

}
