<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileUpdateTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that user succesfully updated its profile
     */
    public function testThatUserDetailsWasUpdated()
    {
        $user = factory('Desire2Learn\User')->create();
        
        $this->actingAs($user)
            ->visit('/profile/edit')
            ->type('damola', 'username')
            ->press('Update')
            ->see('You have successfully updated your profile');
    }

    /**
     * Test that only authenticated user can succesfully updated its profile
     */
    public function testThatOnlyAuthenticatedUserCanUpdateTheirProfile()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->visit('/profile/edit')
            ->seePageIs('/login');
    }

    /**
     * Test that user can not succesfully update its profile
     */
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

    /**
     * Test that user cannot succesfully update its profile due to missing fields
     */
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

    /**
     * Test that user cannot succesfully update its profile picture due to missing image file
     */
    public function testThatImageFileWasNotSelected()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->visit('/profile/edit')
            ->press('Upload')
            ->see('The avatar field is required.');
    }

    /**
     * Test that user succesfully upload its profile picture
     */
    public function testThatTheUserUploadProfilePicture()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->visit('/profile/edit')
            ->attach(storage_path('dem.jpg'), 'avatar')
            ->press('Upload')
            ->see($user->avatar);
    }

    /**
     * Test that user succesfully visit change password page
     */
    public function testThatPasswordChangeWasPageWasVisited()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->visit('/profile/changepassword')
            ->see('Change Password');
    }

    /**
     * Test that user cannot change its password due to missing field
     */
    public function testThatPasswordChangeWasUnsuccessfullDueToEmptyInput()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->visit('/profile/changepassword')
            ->type('', 'oldPassword')
            ->type('', 'newPassword')
            ->press('Submit')
            ->see('The old password field is required.')
            ->see('The new password field is required.');
    }

    /**
     * Test that user cannot change its password due to incorrect input
     */
    public function testThatPasswordChangeWasUnsuccessfullDueToWrongInput()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->visit('/profile/changepassword')
            ->type('london', 'oldPassword')
            ->type('londoner', 'newPassword')
            ->press('Submit')
            ->seePageIs('/profile/changepassword')
            ->see('Change Password');
    }

    /**
     * Test that user successfully change it password
     */
    public function testThatPasswordChangeWassuccessfull()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)
            ->visit('/profile/changepassword')
            ->type($user->password, 'oldPassword')
            ->type('londoner', 'newPassword')
            ->press('Submit')
            ->see($user->username);
    }
}
