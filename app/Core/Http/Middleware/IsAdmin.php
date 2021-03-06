<?php namespace ThreeAccents\Core\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsAdmin
{
    protected $auth;

    function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->is_admin != 1)
        {
            $this->auth->logout();
            return redirect('/admin/login');
        }

        return $next($request);
    }
}