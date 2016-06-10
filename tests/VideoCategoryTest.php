<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoCategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that user visit video category upload page
     */
    public function testVideoCategoryUploadPageWasVisited()
    {
        $user = $this->createUserWithSuperAdminRole();
        
        $this->actingAs($user)->visit('/category/create')
            ->see('NEW CATEGORY UPLOAD');
    }

    /**
     * Test that video category already exist in the database
     */
    public function testThatVideoCategoryAlreadyExist()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Laravel',
            'description' => 'framework for artisan web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('/category/create')
            ->type('Laravel', 'name')
            ->type('framework for artisan web', 'description')
            ->press('Upload Category')
            ->see('The name has already been taken.');
    }

    /**
     * Test that user successfully upload video category
     */
    public function testForSuccessfulVideoCategoryUpload()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Laravel',
            'description' => 'framework for artisan web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('/category/create')
            ->type('PHP', 'name')
            ->type('The elephant language', 'description')
            ->press('Upload Category')
            ->see($category->name);
    }

    /**
     * Test that user cannot successfully upload video category due to missing category name field
     */
    public function testForMissingVideoCategoryNameField()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Laravel',
            'description' => 'framework for artisan web',
            'user_id'     => $user->id,
        ]);
        $this->actingAs($user)->visit('/category/create')
            ->type('framework for artisan web', 'description')
            ->press('Upload Category')
            ->see('The name field is required.');
    }

    /**
     * Test that user cannot successfully upload video category due to missing category description field
     */
    public function testForMissingVideoCategoryDescriptionField()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Laravel',
            'description' => 'framework for artisan web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('/category/create')
            ->type('Laravel', 'name')
            ->press('Upload Category')
            ->see('The description field is required.');
    }
    
    /**
     * Test that user successfully updated
     */
    public function testVideoCategoryWasSuccessfullyUpdated()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Laravel',
            'description' => 'framework for artisan web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('category/'.$category->id.'/edit')
           ->type('PHP', 'name')
           ->type('It is the language of the Html', 'description')
           ->press('Update Category')
           ->seePageIs('/dashboard')
           ->see('UPLOADED VIDEOS');
    }

    /**
     * Test that user can retrieve category if he is the right owner
     */
    public function testCategoryRetrievedByRightOwner()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->actingAs($user)->visit('category/'.$category->id.'/edit')
            ->see('EDIT CATEGORY');
    }

    /**
     * Test that user can not retrieve category because he is not the right owner
     */
    public function testCategoryNotRetrievedByNonOwner()
    {
        $user     = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Javascript',
            'description' => 'It is the language of the web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('/category/100/edit')
            ->seePageIs('/dashboard');
    }

    /**
     * Test that user can delete a category if he is the right owner
     */
    public function testThatCategoryWasDeletedByTheRightOwner()
    {
        $user     = $this->createSpecialUser();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->actingAs($user)
            ->visit('category/'.$category->id.'/delete')
            ->seePageIs('/dashboard');
    }

    /**
     * Test that user cannot delete category because he is not the right owner
     */
    public function testThatCategoryWasNotDeletedByNonOwner()
    {
        $user     = $this->createSpecialUser();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->actingAs($user)->visit('/video/7/delete')
            ->seePageIs('/dashboard');
    }    

    /**
     * Test that user  can get all categories
     */
    public function testgetAllCategories()
    {
        $user       = factory('Desire2Learn\User')->create();
        $categories = factory('Desire2Learn\Category')->create([
            'name'        => 'Javascript',
            'description' => 'It is the language of the web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('dashboard/categories')
            ->see($categories->name);
    }

    /**
     * Test that user can convert a regular user into a superadmin user
     */
    public function createUserWithSuperAdminRole()
    {
        $user = factory('Desire2Learn\User')->create([
            'username'       => 'unicodeveloper',
            'email'          => 'ginger.prosper@php.io',
            'first_name'     => 'Otemuyiwa',
            'last_name'      => 'Prosper',
            'password'       => bcrypt(str_random(10)),
            'remember_token' => str_random(10),
            'role_id'        => 2,
            'avatar'         => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        return $user;
    }

    /**
     * This method is to create a special user that can delete a category and craete asuper admin user
     */
    public function createSpecialUser()
    {
        $user = factory('Desire2Learn\User')->create([
            'username'       => 'unicodeveloper',
            'email'          => 'ginger.prosper@php.io',
            'first_name'     => 'Otemuyiwa',
            'last_name'      => 'Prosper',
            'password'       => bcrypt(str_random(10)),
            'remember_token' => str_random(10),
            'role_id'        => 3,
            'avatar'         => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        return $user;
    }

    /**
     * Test that a user can see related videos
     */
    public function testRelatedVideos()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create();
        $video    = factory('Desire2Learn\Video')->create([
            'title'        => 'Haskell',
            'description'  => 'It is the language of the web',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);

        $this->visit('category/'.$category->id .'/videos')
            ->see($video->title);
    }

    /**
     * Test that user uploaded a video under a category
     */
    public function testThatVideoHasNotBeenUploadedForACategory()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create();
        $video    = factory('Desire2Learn\Video')->create();

        $this->visit('video/2')
            ->seePageIs('/');
    }

    /**
     * Test that user only special user cab convert a regular user to a super admin user
     */
    public function testThatOnlySpecialUserCanGetAdminUserPage()
    {
        $user = $this->createSpecialUser();

        $this->actingAs($user)->visit('/dashboard/admin/new')
            ->see('Super-Admin form');
    }

    /**
     * Test that super admin user can see their uploaded category
     */
    public function testThatUsersCanViewUploadedCategory()
    {
        $user       = $this->createUserWithSuperAdminRole();
        $categories = factory('Desire2Learn\Category')->create([
            'name'        => 'Javascript',
            'description' => 'It is the language of the web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('/category/uploaded')
            ->see($categories->name);
    }

    /**
     * Test that super admin user can see their uploaded category
     */
    public function testThatUserHaveNotUploadedVideoCategory()
    {
        $user = $this->createUserWithSuperAdminRole();

        $this->actingAs($user)->visit('/category/uploaded')
            ->see('You haven\'t uploaded any category yet');
    }
}
