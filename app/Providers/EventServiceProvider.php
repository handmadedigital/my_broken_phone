<?php namespace ThreeAccents\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'ThreeAccents\Auth\Events\UserWasRegistered' => [
			'ThreeAccents\Auth\Listeners\UserRegistrationListeners@addUserDetails',
			'ThreeAccents\Auth\Listeners\UserRegistrationListeners@logUserIn',
		],
		'ThreeAccents\Orders\Events\OrderWasPlaced' => [
			'ThreeAccents\Orders\Listeners\OrderPlacingListener@sendAdminOrderWasPlacedEmails'
		],
		'ThreeAccents\Orders\Events\OrderPriceWasSet' => [
			'ThreeAccents\Orders\Listeners\OrderSetPriceListener@sendUserOrderPriceEmail'
		],
		'ThreeAccents\Orders\Events\OrderWasDeclined' => [
			'ThreeAccents\Orders\Listeners\UserDeclinedOrderListener@sendAdminUserDeclinedOrderEmail'
		],
		'ThreeAccents\Orders\Events\OrderWasAccepted' => [
			'ThreeAccents\Orders\Listeners\UserAcceptedOrderListener@sendAdminUserAcceptedOrderEmail'
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
