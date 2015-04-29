<?php namespace ThreeAccents\Orders\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['id', 'phone_id', 'payment_method_id', 'price'];


	/*************************/
	/*
	 * HELPER FUNCTIONS
	 */
	/*************************/

	/**
	 * Check if order has been placed
	 *
	 * @param $order
	 * @return bool
	 */
	public function isPlaced()
	{
		if($this->status->name === 'order placed') return true;

		return false;
	}

	public function isQuoted()
	{
		if($this->status->name === 'quote sent') return true;

		return false;
	}

	public function isAccepted()
	{
		if($this->status->name === 'accepted') return true;

		return false;
	}

	public function isDeclined()
	{
		if($this->status->name === 'declined') return true;

		return false;
	}




	/*************************/
	/*
	 * COMMAND FUNCTIONS
	 */
	/*************************/

	public static function place($phone_id, $payment_method_id)
	{
		return new static(compact('phone_id', 'payment_method_id'));
	}

	public static function setPrice($id, $price)
	{
		return new static(compact('id', 'price'));
	}

	public static function accept($id)
	{
		return new static(compact('id'));
	}

	public static function decline($id)
	{
		return new static(compact('id'));
	}

	/*************************/
	/*
	 * RELATIONSHIP FUNCTIONS
	 */
	/*************************/

	public function user()
	{
		return $this->belongsTo('ThreeAccents\Users\Entities\User');
	}

	public function phone()
	{
		return $this->belongsTo('ThreeAccents\Devices\Phones\Entities\Phone');
	}

	public function status()
	{
		return $this->belongsTo('ThreeAccents\Orders\Entities\OrderStatus');
	}

	public function payment_method()
	{
		return $this->belongsTo('ThreeAccents\Orders\Entities\PaymentMethod', 'payment_method_id');
	}

}
