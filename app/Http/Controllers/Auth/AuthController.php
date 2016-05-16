<?php

namespace Desire2Learn\Http\Controllers\Auth;

use Auth;
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
            'email' => 'required',
            'password' => 'required'
        ]);

        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));

        if (!$authStatus) {
            return redirect()->back()->with('info', 'Invalid Email or Password');
        }

        return redirect()->intended('/')->with('info', 'You are now signed in');
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
            'avatar' => null
        ]);

        dd(Auth::user());

        return redirect()->route('index')->with('Info', 'Your account has been created and you can now sign in');
    }

    /**
     * logs user out.
     *
     * @return home
     */
    public function logOut()
    {
        Auth::logout();

        return redirect()->route('index')->with('Info', 'You have successully log out from your account');
    }
}
