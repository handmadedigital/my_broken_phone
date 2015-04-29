<?php namespace ThreeAccents\Devices\Phones\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model {

	/***************************************/
	/*
     * Relationship Methods
     */
	/****************************************/

	public function problems()
	{
		return $this->belongsToMany('ThreeAccents\Devices\Phones\Entities\PhoneProblem')->withPivot('price');
	}

}
