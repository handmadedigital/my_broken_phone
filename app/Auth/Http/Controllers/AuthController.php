<?php namespace ThreeAccents\Auth\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use ThreeAccents\Auth\Commands\UserLogInCommand;
use ThreeAccents\Auth\Commands\UserRegisterCommand;
use ThreeAccents\Auth\Http\Requests\LoginRequest;
use ThreeAccents\Auth\Http\Requests\RegisterRequest;
use ThreeAccents\Core\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @var
     */
    protected  $auth;

    /**
     * @param Guard $auth
     */
    function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getSignUp()
    {
        return view('auth.sign-up');
    }

    /**
     * Process the log in process
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            $this->dispatch(UserLogInCommand::class);

            flash()->message('You are now logged in');

            return redirect()->intended('/');
        }

        flash()->error('Incorrect credentials');

        return redirect()->back();
    }

    /**
     * Process registration process
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegisterRequest $request)
    {
        $this->dispatch(UserRegisterCommand::class, null, [
            'ThreeAccents\Auth\Decorators\RegisterSanitizerDecorator',
            'ThreeAccents\Auth\Decorators\SplitFullNameDecorator',
        ]);

        flash()->message('Thank you for registering!');

        return redirect()->intended('/auth/sign-up');
    }

    /**
     * Logout the logged in user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/auth/sign-up');
    }
}