<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class Video extends TestCase
{
    use DatabaseTransactions;

    public function testVideoWasVisited()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)->visit('dashboard/video/create')
             ->see('NEW VIDEO UPLOAD');
    }

    public function testThatVideoAlreadyExist()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->select($category->id, 'category')
             ->type('Setting up Laravel 5.2', 'title')
             ->type('https://www.youtube.com/watch?v=9vN2IdeALaI', 'url')
             ->type('Laravel', 'description')
             ->press('Upload Video')
             ->see('Views');
    }

    public function testForSuccessfulVideoUpload()
    {
        // $user = factory('Desire2Learn\User')->create();
        // $category = factory('Desire2Learn\Category')->create([
        //     'user_id'     => $user->id,
        //     'name'        => 'Laravel',
        //     'description' => 'framework of the artisan',
        // ]);

        // $video = $this->uploadVideo($user, $category);
        // $response = $this->actingAs($user)->visit('/dashboard/video/create')
        //      ->select($category->id, 'category')
        //      ->type('Using the cloud system available on laravel', 'title')
        //      ->type('https://www.youtube.com/watch?v=9vN2IdeALaJ', 'url')
        //      ->press('Upload Video')
        //      ->see('Likes');
    }

    public function testThatAllFieldsAreMissingExceptIcon()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);
        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type('framework of the artisan', 'description')
             ->press('Upload Video')
             ->see('The title field is required.')
             ->see('The category field is required.')
             ->see('The url field is required.');
    }

    public function testThatAllFieldsAreMissingExceptTitle()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type('Writing an integration test in Laravel', 'title')
             ->press('Upload Video')
             ->see('The description field is required.')
             ->see('The category field is required.')
             ->see('The url field is required.');
    }

    public function testThatAllFieldsAreMissingExceptUrl()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
             ->press('Upload Video')
             ->see('The title field is required.')
             ->see('The category field is required.')
             ->see('The description field is required.');
    }

    public function testThatAllFieldsAreMissingExceptCategory()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);
        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type($category->id, 'category')
             ->press('Upload Video')
             ->see('The title field is required.')
             ->see('The url field is required.')
             ->see('The description field is required.');
    }
    
    public function testThatUrlAndiconFieldsAreMissing()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type($category->id, 'category')
             ->type('Switching from Mailgun to Sendgrid', 'title')
             ->press('Upload Video')
             ->see('The url field is required.')
             ->see('The description field is required.');
    }

    public function testThatCategoryAndTitleFieldsAreMissing()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
             ->type('framework of the artisan', 'description')
             ->press('Upload Video')
             ->see('The category field is required.')
             ->see('The title field is required.');
    }

    public function testThatTitleAndiconFieldsAreMissing()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboard/video/create')
             ->type($category->id, 'category')
             ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
             ->press('Upload Video')
             ->see('The description field is required.')
             ->see('The title field is required.');
    }

    public function testThatCategoryAndUrlFieldsAreMissing()
    {
        $user = factory('Desire2Learn\User')->create();
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

    public function testThatVideoWasUpdated()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/video/edit/'.$video->id)
          ->select($category->id, 'category')
          ->type('Laravel', 'title')
          ->type('It is the language of the Html', 'description')
          ->type('https://www.youtube.com/watch?v=hKUwxXgz2RM', 'url')
          ->press('Update Video')
          ->seePageIs('/dashboard/index')
          ->see('Likes');
    }
    
    public function testThatOnlyLoggedInUserCanUpdateVideo()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->visit('/video/edit/'.$video->id)
          ->seePageIs('/login');
    }

    public function testThatASingleVideoWasRetrived()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/video/edit/'.$video->id)
         ->see($video->title);
    }

    public function testThatASingleVideoWasNotRetrived()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);
        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('video/edit/7')
         ->seePageIs('/dashboard/index');
    }

    // public function testgetAllVideos()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboard/video/view')
    //     ->see($video->title)
    //     ->see($video->url)
    //     ->see($video->category->name);
    // }

    

    public function testThatOnlyLoggedInUserCanDeleteVideo()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);
        $video = $this->uploadVideo($user, $category);
        $this->visit('/video/delete/'.$video->id)
        ->seePageIs('/login');
    }

    public function uploadVideo($user, $category)
    {
        $video = factory('Desire2Learn\Video')->create([
          'title'        => 'Laravel',
          'user_id'      => $user->id,
          'views'        => 0,
        ]);

        return $video;
    }

    public function testInValidYoutubeUrl()
    {
        $user = factory('Desire2Learn\User')->create();
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

    public function testThatAUrlClickLinksToAVideo()
    {
        $user = factory('Desire2Learn\User')->create();
        $video = factory('Desire2Learn\Video')->create();
        $this->visit('/')
        ->click($video->title)
        ->seePageIs('/video/'.$video->id);
    }
}