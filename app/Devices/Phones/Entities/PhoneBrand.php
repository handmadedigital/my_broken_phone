<?php namespace ThreeAccents\Devices\Phones\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneBrand extends Model
{

	/***********************/
	/*
	 * RELATIONSHIP FUNCTIONS
	 */
	/***********************/

	public function model()
	{
		return $this->hasMany('ThreeAccents\Devices\Phones\Entities\PhoneModel');
	}

}
