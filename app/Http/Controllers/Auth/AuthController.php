<?php

namespace Desire2Learn\Http\Controllers\Auth;

use Auth;
use Alert;
use Validator;
use Socialite;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer as Mail;
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

    protected $mail;
    protected $loginPath    = '/login';
    protected $registerPath = '/register';
    protected $redirectTo = '/';

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
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);

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
    protected function postRegister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

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
