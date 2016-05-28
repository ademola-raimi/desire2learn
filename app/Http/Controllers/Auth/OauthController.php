<?php

namespace Desire2Learn\Http\Controllers\Auth;

use Auth;
use Socialite;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer as Mail;
use Desire2Learn\Http\Controllers\Controller;
use Desire2Learn\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class OauthController extends controller
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
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
    
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', '=', $user->getEmail())
            ->orWhere('username', '=', $user->getNickname())
            ->first();

        if ($authUser) {
            return $authUser;
        }
        
        return User::create([
            'username'       => $user->getNickname() ?: $user->getName(),
            'password'       => bcrypt(str_random(10)),
            'email'          => $user->getEmail() ?: str_random(10).'@noemail.app',
            'avatar'         => $user->getAvatar(),
            'role_id'        => 1,
            'remember_token' => str_random(10),
        ]);
    }
}