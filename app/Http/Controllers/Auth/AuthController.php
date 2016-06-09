<?php

namespace Desire2Learn\Http\Controllers\Auth;

use Auth;
use Alert;
use Validator;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Desire2Learn\Http\Controllers\Controller;
use Desire2Learn\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Desire2Learn\Http\Requests\LoginFormRequest;
use Desire2Learn\Http\Requests\RegisterFormRequest;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * This method displays the signup page.
     *
     * @return signup page
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * This method displays the login page.
     *
     * @return login page
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
    public function postLogin(LoginFormRequest $request)
    {
        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));

        if (!$authStatus) {
            Alert::error('Invalid email or Password', 'Error');

            return redirect()->back();
        }

        alert()->success('You are now signed in', 'Success');

        return redirect()->intended('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return User
     */
    protected function postRegister(RegisterFormRequest $request)
    {
        User::create([
            'username'   => $request['username'],
            'last_name'  => $request['last_name'],
            'first_name' => $request['first_name'],
            'email'      => $request['email'],
            'password'   => bcrypt($request['password']),
            'avatar'     => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        alert()->success('Your account has been successully created', 'success');

        Auth::attempt($request->only(['username', 'password']));

        return redirect()->route('index');
    }

    /**
     * logs user out.
     *
     * @return home
     */
    public function logOut()
    {
        Auth::logout();
        
        alert()->success('You have successully log out from your account', 'Good bye!');

        return redirect()->route('index');
    }
}
