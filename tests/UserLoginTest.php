<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserLoginTest extends TestCase
{
    use DatabaseTransactions;

    public function testForunsuppliedLoginDetails()
    {
        $this->visit('/login')
            ->type('', 'email')
            ->type('', 'password')
            ->press('Log In')
            ->see('The email field is required.')
            ->see('The password field is required.');
    }

    public function testForSuccessfulLogin()
    {
        $user = factory('Desire2Learn\User')->create([
            'username'       => 'Demo',
            'email'          => 'demola@gmail.com',
            'password'       => bcrypt('london'),
            'first_name'    => 'Demola',
            'last_name'    => 'Raimi',
            'role_id'        => 1,
            'avatar'    => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        $this->actingAs($user)
           ->visit('/login')
           ->type('demola@gmail.com', 'email')
           ->type('london', 'password')
           ->press('Log In')
           ->seePageIs('/')
           ->see('Demo');
    }

    public function testForSuccessfulLogout()
    {
        $user = factory('Desire2Learn\User')->create([
            'username'       => 'Demo',
            'email'          => 'demola@gmail.com',
            'password'       => bcrypt('london'),
            'first_name'    => 'Demola',
            'last_name'    => 'Raimi',
            'role_id'        => 1,
            'avatar'    => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        $this->actingAs($user)
           ->visit('/logout')
           ->seePageIs('/')
           ->see('Register')
           ->see('VIDEOS BY CATEGORY');
    }

    public function testForUnSuccessfulLogin()
    {
        $this->visit('/login')
            ->type('verem@gmail.com', 'email')
            ->type('dugeri', 'password')
            ->press('Log In')
            ->see('Invalid email or Password');
    }
}