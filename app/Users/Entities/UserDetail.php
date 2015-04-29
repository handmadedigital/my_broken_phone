<?php namespace ThreeAccents\Users\Entities;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $fillable = ['user_id', 'address', 'city', 'state', 'country', 'zip', 'paypal_email'];

	/**************************/
	/*
	 * COMMAND FUNCTIONS
	 */
	/**************************/

	/**
	 * @param $user_id
	 * @param $address
	 * @param $city
	 * @param $state
	 * @param $country
	 * @param $zip
	 * @param $paypal_email
	 * @internal param $address
	 * @return static
	 */
	public static function addDetails($user_id, $address, $city, $state, $country, $zip, $paypal_email)
	{
		return new static(compact('user_id', 'address', 'city', 'state', 'country', 'zip', 'paypal_email'));
	}

}
