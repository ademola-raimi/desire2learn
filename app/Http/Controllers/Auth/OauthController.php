<?php

namespace Desire2Learn\Http\Controllers\Auth;

use Auth;
use Socialite;
use Desire2Learn\User;
use Illuminate\Http\Request;
use Desire2Learn\Http\Controllers\Controller;
use Desire2Learn\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class OauthController extends controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user     = Socialite::driver($provider)->user();
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
