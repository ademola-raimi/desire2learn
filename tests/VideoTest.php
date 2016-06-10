<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class Video extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that video upload form was visited
     */
    public function testVideoUploadFormWasVisited()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)->visit('dashboard/video/create')
            ->see('NEW VIDEO UPLOAD');
    }

    /**
     * Test that video already exist
     */
    public function testThatVideoAlreadyExist()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->select($category->id, 'category')
            ->type('Laravel', 'title')
            ->type('https://www.youtube.com/watch?v=9vN2IdeALaI', 'url')
            ->type('Laravel', 'description')
            ->press('Upload Video')
            ->see('title');
    }

    /**
     * Test that video upload was successful
     */
    public function testForSuccessfulVideoUpload()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->select($category->id, 'category')
            ->type('Using the cloud system available on laravel', 'title')
            ->type('https://www.youtube.com/watch?v=9vN2IdeALaJ', 'url')
            ->type('Using the cloud system available on laravel', 'description')
            ->press('Upload Video')
            ->see($video->title);
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatAllFieldsAreMissingExceptIcon()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type('framework of the artisan', 'description')
            ->press('Upload Video')
            ->see('The title field is required.')
            ->see('The category field is required.')
            ->see('The url field is required.');
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatAllFieldsAreMissingExceptTitle()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type('Writing an integration test in Laravel', 'title')
            ->press('Upload Video')
            ->see('The description field is required.')
            ->see('The category field is required.')
            ->see('The url field is required.');
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatAllFieldsAreMissingExceptUrl()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
            ->press('Upload Video')
            ->see('The title field is required.')
            ->see('The category field is required.')
            ->see('The description field is required.');
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatAllFieldsAreMissingExceptCategory()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type($category->id, 'category')
            ->press('Upload Video')
            ->see('The title field is required.')
            ->see('The url field is required.')
            ->see('The description field is required.');
    }
    
    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatUrlAndDescriptionAreMissing()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type($category->id, 'category')
            ->type('Switching from Mailgun to Sendgrid', 'title')
            ->press('Upload Video')
            ->see('The url field is required.')
            ->see('The description field is required.');
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatCategoryAndTitleFieldsAreMissing()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
            ->type('framework of the artisan', 'description')
            ->press('Upload Video')
            ->see('The category field is required.')
            ->see('The title field is required.');
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */ 
    public function testThatTitleAndDescriptionAreMissing()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type($category->id, 'category')
            ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
            ->press('Upload Video')
            ->see('The description field is required.')
            ->see('The title field is required.');
    }

    /**
     * Test that video upload was unsuccessful due to missing fields
     */
    public function testThatCategoryAndUrlFieldsAreMissing()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->type('Event in Laravel', 'title')
            ->press('Upload Video')
            ->see('The category field is required.')
            ->see('The url field is required.');
    }

    /**
     * Test that video upload was successful
     */
    public function testThatVideoWasUpdated()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('video/'.$video->id.'/edit')
            ->select($category->id, 'category')
            ->type('Laravel', 'title')
            ->type('It is the language of the Html', 'description')
            ->type('https://www.youtube.com/watch?v=hKUwxXgz2RM', 'url')
            ->press('Update Video')
            ->seePageIs('/dashboard')
            ->see('UPLOADED VIDEOS');
    }
    
    /**
     * Test that video upload was unsuccessful due to unauthenticated user access 
     * and redirect the unathenticated user to login page
     */
    public function testThatOnlyLoggedInUserCanUpdateVideo()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->visit('video/'.$video->id.'/edit')
            ->seePageIs('/login');
    }

    /**
     * Test that video was retrieved by the right owner
     */
    public function testVideoRetrievedByRightOwner()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('video/'.$video->id.'/edit')
            ->see($video->title);
    }

    /**
     * Test that video was not retrieved because the user is not the creator
     */
    public function testThatVideoNotRetrievedByNonOwner()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);
        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('video/7/edit')
         ->seePageIs('/dashboard');
    }
      

    /**
     * Test that video was only be deleted  by the an authenticated user
     */
    public function testThatOnlyLoggedInUserCanDeleteVideo()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);
        $video = $this->uploadVideo($user, $category);

        $this->visit('video/'.$video->id.'/delete')
            ->seePageIs('/login');
    }

    /**
     * Test that video was deleted by the creator
     */
    public function testThatVideoWasDeletedByTheRightOwner()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video    = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('video/'.$video->id.'/delete');
        $this->visit('/video/'.$video->id)
            ->seePageIs('/');
    }

    /**
     * Test that video was not deleted because the user is not the creator
     */
    public function testThatVideoWasNotDeletedByNonOwner()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video    = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/video/7/delete')
            ->seePageIs('/dashboard');
    }

    /**
     * This method uplaod a video
     *
     * @return object
     * 
     */
    public function uploadVideo($user, $category)
    {
        $video = factory('Desire2Learn\Video')->create([
            'title'        => 'Laravel',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);

        return $video;
    }

    /**
     * Test invalid youtube url
     */
    public function testInValidYoutubeUrl()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'Framework of the arisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)->visit('/dashboard/video/create')
            ->select($category->id, 'category')
            ->type('Laravel URL generator', 'title')
            ->type('//http://laravel.com/doc', 'url')
            ->type('Framework of the arisan', 'description')
            ->press('Upload Video')
            ->see('The url format is invalid.');
    }

    /**
     * Test that video Id of the youtube url is invalid
     */
    public function testInValidYoutubeUrlVideoId()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'Framework of the arisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        
        $this->actingAs($user)->visit('/dashboard/video/create')
            ->select($category->id, 'category')
            ->type('Laravel URL generator', 'title')
            ->type('https://www.youtube.com/watch?v=7TF00hJI78', 'url')
            ->type('Framework of the arisan', 'description')
            ->press('Upload Video')
            ->see('New Video upload');
    }

    /**
     * Test that the url length is not too short
     */
    public function testYoutubeUrlLengthIsTooShort()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'Framework of the arisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        
        $this->actingAs($user)->visit('/dashboard/video/create')
            ->select($category->id, 'category')
            ->type('Laravel URL generator', 'title')
            ->type('http://cat.ph', 'url')
            ->type('Framework of the arisan', 'description')
            ->press('Upload Video')
            ->see('New Video upload');
    }

    /**
     * Test that url clicks to the video
     */
    public function testThatAUrlClickLinksToAVideo()
    {
        $user  = factory('Desire2Learn\User')->create();
        $video = factory('Desire2Learn\Video')->create();

        $this->visit('/')
            ->click($video->title)
            ->seePageIs('/video/'.$video->id);
    }
    
    /**
     * Test that uploaded video is instantly available for view
     */    
    public function testUploadedVideoIsAvailable()
    {
        $user  = factory('Desire2Learn\User')->create();
        $video = factory('Desire2Learn\Video')->create([
            'title'        => 'Haskell',
            'description'  => 'It is the language of the web',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);

        $this->actingAs($user)->visit('/dashboard/uploaded/videos')
            ->see($video->name);
    }

    /**
     * Test that uploaded video page has no videos 
     */
    public function testUploadedVideoIsNotAvailable()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)->visit('/dashboard/uploaded/videos')
            ->see('You haven\'t uploaded any video yet');
    }

    /**
     * Test that uploaded video is instantly available for view
     */    
    public function testFavouritedVideoIsAvailable()
    {
        $user  = factory('Desire2Learn\User')->create();
        $video = factory('Desire2Learn\Video')->create([
            'title'        => 'Haskell',
            'description'  => 'It is the language of the web',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);

        $this->actingAs($user)->visit('/dashboard/video/favourited')
            ->see($video->name);
    }

    /**
     * Test that uploaded video page has no videos 
     */
    public function testFavouritedVideoIsNotAvailable()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)->visit('/dashboard/video/favourited')
            ->see('You don\'t have any favourited video yet');
    }

    /**
     * Test the homepage has no videos 
     */
    public function testVideosAreNotAvailableOnHomePage()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->visit('/')
            ->see('Oops sorry we have no videos yet');
    }

    /**
     * Test homepage has videos for display
     */
    public function testVideosAreAvailableOnHomePage()
    {
        $user  = factory('Desire2Learn\User')->create();
        $video = factory('Desire2Learn\Video')->create([
            'title'        => 'Haskell',
            'description'  => 'It is the language of the web',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);

        $this->visit('/')
            ->see($video->title);
    }

    /**
     * Test homepage has videos for display
     */
    public function testGetAllVideos()
    {
        $user  = factory('Desire2Learn\User')->create();
        $video = factory('Desire2Learn\Video')->create([
            'title'        => 'Haskell',
            'description'  => 'It is the language of the web',
            'user_id'      => $user->id,
            'views'        => 0,
        ]);

        $this->visit('/videos')
            ->see($video->title);
    }

    /**
     * Test homepage has videos for display
     */
    public function testGetCategoryVideos()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->visit('category/' . $category->id . '/videos')
            ->see($video->title);
    }
}
