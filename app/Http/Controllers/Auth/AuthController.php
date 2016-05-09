<?php

namespace Desire2Learn\Http\Controllers\Auth;

use Auth;
use Validator;
use Socialite;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Desire2Learn\Http\Controllers\Controller;
use Desire2Learn\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * This method displays the signup page.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * This method displays the login page.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getLogin()
    {
        return view('auth.login');
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return User
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));

        if (!$authStatus) {
            return redirect()->back()->with('info', 'Invalid Email or Password');
        }

        return redirect()->route('login')->with('info', 'You are now signed in');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return User
     */
    protected function postRegister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        return User::create([
            'username'   => $request['username'],
            'last_name'  => $request['last_name'],
            'first_name' => $request['first_name'],
            'email'      => $request['email'],
            'password'   => bcrypt($request['password']),
            'avatar_url'     => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200', 
        ]);

        return redirect()
            ->route('index')
            ->withInfo('Your account has been created and you can now sign in');
    }
}
