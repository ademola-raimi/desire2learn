<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Socialite\Facades\Socialite;

class UserSignUpTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that user sign up successfully
     */
    public function testForSuccessfulSignUp()
    {
        Session::start();

        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->call('POST', 'signup/new', [
                'username'   => 'Demo',
                'email'      => 'demola@gmail.com',
                'password'   => bcrypt('london'),
                'first_name' => 'Demola',
                'last_name'  => 'Raimi',
                'role_id'    => 1,
                'avatar'     => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        $this->actingAs($user)
           ->visit('/signup')
           ->type('demola@gmail.com', 'email')
           ->type('london', 'password')
           ->type('Demo', 'username')
           ->type('Demola', 'first_name')
           ->type('Raimi', 'last_name')
           ->press('Register')
           ->seePageIs('/')
           ->see('Demo');
    }

    /**
     * Test that user cannot sign up successfully due to data existence in the database
     */
    public function testThatUserAlreadyExists()
    {
        Session::start();

        factory('Desire2Learn\User')->create([
            'username'   => 'Demo',
            'email'      => 'demola@gmail.com',
            'password'   => bcrypt('london'),
            'first_name' => 'Demola',
            'last_name'  => 'Raimi',
            'role_id'    => 1,
            'avatar'     => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        $this->call('POST', 'signup', [
            'username'   => 'Demo',
            'email'      => 'demola@gmail.com',
            'password'   => bcrypt('london'),
            'first_name' => 'Demola',
            'last_name'  => 'Raimi',
            'role_id'    => 1,
            'avatar'     => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        $this->visit('/signup')
            ->type('demola@gmail.com', 'email')
            ->type('Demo', 'username')
            ->press('Register')
            ->see('The username has already been taken.')
            ->see('The email has already been taken.');
        
    }

    /**
     * Test that user can sign up and sign in successfully using social network
     */
    public function testThatUserSignUpUsingOauth()
    {
        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');

        $provider->shouldReceive('redirect')->andReturn('Redirected');

        $providerName  = class_basename($provider);
        $socialAccount = factory('Desire2Learn\User')->create(['provider' => $providerName]);
        $abstractUser  = Mockery::mock('Laravel\Socialite\Two\User');

        $abstractUser->shouldReceive('getId')
            ->andReturn($socialAccount->provider_user_id)
            ->shouldReceive('getEmail')
            ->andReturn(str_random(10).'@noemail.app')
            ->shouldReceive('getNickname')
            ->andReturn('Olotin Temitope')
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200');

        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        $this->visit('/facebook/callback')
            ->seePageIs('/');
    }
}
