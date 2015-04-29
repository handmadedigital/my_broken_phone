<?php namespace ThreeAccents\Core\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsOwner
{
	protected $auth;

	function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$slug = $request->route('user_slug');

		if($slug !== $this->auth->user()->slug) return redirect()->to('/');

		return $next($request);
	}

}
