<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileUpdateTest extends TestCase
{
    use DatabaseTransactions;

    public function testThatUserDetailsWasUpdated()
    {
        $user = factory('Desire2Learn\User')->create();
        $this->actingAs($user)
            ->visit('/profile/edit')
            ->type('damola', 'username')
            ->press('Update')
            ->see('You have successfully updated your profile');
    }

    public function testThatOnlyAuthenticatedUserCanUpdateTheirProfile()
    {
        $user = factory('Desire2Learn\User')->create();
        $this->visit('/profile/edit')
            ->seePageIs('/login');
    }

    public function testThatUserProfileWasNotUpdated()
    {
        $user = factory('Desire2Learn\User')->create();
        $this->actingAs($user)
            ->visit('/profile/edit')
            ->type('', 'username')
            ->type('damola@gmail.com', 'email')
            ->type('Damola', 'first_name')
            ->press('Update')
            ->see('The username field is required.');
    }

    public function testThatSomeFieldsAreMissing()
    {
        $user = factory('Desire2Learn\User')->create();
        $this->actingAs($user)
            ->visit('/profile/edit')
            ->type('', 'username')
            ->type('', 'email')
            ->type('', 'last_name')
            ->press('Update')
            ->see('The username field is required.')
            ->see('The email field is required.')
            ->see('The last name field is required.');
    }

    public function testThatImageFileWasNotSelected()
    {
        $user = factory('Desire2Learn\User')->create();
        $this->actingAs($user)
            ->visit('/profile/edit')
            ->press('Upload')
            ->see('The avatar field is required.');
    }

    // public function testThatTheUserUploadProfilePicture()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $this->actingAs($user)
    //         ->visit('/profile/edit')
    //         ->attach(storage_path('dem.jpg'), 'avatar')
    //         ->press('Upload')
    //         ->see('Avatar updated successfully');
    // }
}
