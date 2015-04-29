<?php namespace ThreeAccents\Devices\Phones\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneProblem extends Model
{

	/***************************************/
	/*
     * Relationship Methods
     */
	/****************************************/

	public function models()
	{
		return $this->belongsToMany('ThreeAccents\Devices\Phones\Entities\PhoneModel')->withPivot('price');
	}
}
