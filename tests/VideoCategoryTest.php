<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoCategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function testVideoCategoryPageWasVisited()
    {
        $user = $this->createUserWithSuperAdminRole();
        
        $this->actingAs($user)->visit('/category/create')
            ->see('NEW CATEGORY UPLOAD');
    }

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
            ->see('Reaction');
    }

    public function testForMissingVideoCategoryNameField()
    {
        $user = $this->createUserWithSuperAdminRole();
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

    public function testForMissingVideoCategoryDescriptionField()
    {
        $user = $this->createUserWithSuperAdminRole();
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

    public function testVideoCategoryWasSuccessfullyUpdated()
    {
        $user = $this->createUserWithSuperAdminRole();

        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Laravel',
            'description' => 'framework for artisan web',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user)->visit('/category/edit/'.$category->id)
          ->type('PHP', 'name')
          ->type('It is the language of the Html', 'description')
          ->press('Update Category')
          ->seePageIs('/dashboard/index')
          ->see('Reaction');
    }

    public function testCategoryRetrievedByRightOwner()
    {
        $user = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->actingAs($user)->visit('/category/edit/'.$category->id)
            ->see('EDIT CATEGORY');
    }

    public function testCategoryNotRetrievedByNonOwner()
    {
        $user = $this->createUserWithSuperAdminRole();
        $category = factory('Desire2Learn\Category')->create([
            'name'        => 'Javascript',
            'description' => 'It is the language of the web',
            'user_id'     => $user->id,
        ]);
        $this->actingAs($user)->visit('/category/edit/100')
         ->seePageIs('/dashboard/index');
    }

    public function testThatCategoryWasDeletedByTheRightOwner()
    {
        $user = $this->createSpecialUser();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->actingAs($user)->visit('/category/delete/'.$category->id);
        $this->visit('/category/'.$category->id)
            ->seePageIs('/dashboard/index');
    }

    public function testThatCategoryWasNotDeletedByNonOwner()
    {
        $user = $this->createSpecialUser();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->actingAs($user)->visit('/video/delete/7')
            ->seePageIs('/dashboard/index');
    }    

    public function testgetAllCategories()
    {
        $user = factory('Desire2Learn\User')->create();
        $categories = factory('Desire2Learn\Category')->create([
            'name'        => 'Javascript',
            'description' => 'It is the language of the web',
            'user_id'     => $user->id,
        ]);
        $this->actingAs($user)->visit('/dashboard/category')
        ->see($categories->name);
    }

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
            'avatar'    => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        return $user;
    }

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
            'avatar'    => 'https://en.gravatar.com/userimage/102347280/b3e9c138c1548147b7ff3f9a2a1d9bb0.png?size=200',
        ]);

        return $user;
    }

    public function testRelatedVideos()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create();
        $video = factory('Desire2Learn\Video')->create([
            'title'        => 'Haskell',
            'description'  => 'It is the language of the web',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);
        $this->visit('/category/video/'.$category->id)
        ->see($video->title);
    }

    public function testThatVideosHasNotBeenUploadedForACategory()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create();
        $video = factory('Desire2Learn\Video')->create();
        $this->visit('video/2')
        ->seePageIs('/');
    }
}