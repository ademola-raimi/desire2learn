<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoTest extends TestCase
{
    use DatabaseTransactions;

    public function testVideoWasVisited()
    {
        $user = factory('Desire2Learn\User')->create();

        $this->actingAs($user)->visit('/dashboar/video/create')
             ->see('NEW VIDEO UPLOAD');
    }

    // public function testThatVideoAlreadyExist()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/Upload Video')
    //          ->select($category->id, 'category')
    //          ->type('Setting up Laravel 5.0', 'title')
    //          ->type('https://www.youtube.com/watch?v=9vN2IdeALaI', 'url')
    //          ->type('L Laravel', 'icon')
    //          ->press('Upload Video')
    //          ->see('Video uploaded successfully');
    // }

    public function testForSuccessfulVideoUpload()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'icon' => 'L',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->actingAs($user)->visit('/dashboar/video/create')
             ->select($category->id, 'category')
             ->type('Using the cloud system available on laravel', 'title')
             ->type('https://www.youtube.com/watch?v=9vN2IdeALaJ', 'url')
             ->press('Upload Video')
             ->see('Video uploaded successfully');
    }

    // public function testThatAllFieldsAreMissingExceptIcon()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type('Laravel', 'icon')
    //          ->press('Upload Video')
    //          ->see('The title field is required.')
    //          ->see('The category field is required.')
    //          ->see('The url field is required.');
    // }
    // public function testThatAllFieldsAreMissingExceptTitle()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type('Writing an integration test in Laravel', 'title')
    //          ->press('Upload Video')
    //          ->see('The icon field is required.')
    //          ->see('The category field is required.')
    //          ->see('The url field is required.');
    // }
    // public function testThatAllFieldsAreMissingExceptUrl()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
    //          ->press('Upload Video')
    //          ->see('The title field is required.')
    //          ->see('The category field is required.')
    //          ->see('The icon field is required.');
    // }
    // public function testThatAllFieldsAreMissingExceptCategory()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id' => $user->id,
    //         'name'    => 'Laravel',
    //         'icon'    => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type($category->id, 'category')
    //          ->press('Upload Video')
    //          ->see('The title field is required.')
    //          ->see('The url field is required.')
    //          ->see('The icon field is required.');
    // }
    // public function testThatUrlAndiconFieldsAreMissing()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type($category->id, 'category')
    //          ->type('Switching from Mailgun to Sendgrid', 'title')
    //          ->press('Upload Video')
    //          ->see('The url field is required.')
    //          ->see('The icon field is required.');
    // }
    // public function testThatCategoryAndTitleFieldsAreMissing()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
    //          ->type('L', 'icon')
    //          ->press('Upload Video')
    //          ->see('The category field is required.')
    //          ->see('The title field is required.');
    // }

    // public function testThatTitleAndiconFieldsAreMissing()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type($category->id, 'category')
    //          ->type('https://www.youtube.com/watch?v=eUJUOxPpiQc', 'url')
    //          ->press('Upload Video')
    //          ->see('The icon field is required.')
    //          ->see('The title field is required.');
    // }

    // public function testThatCategoryAndUrlFieldsAreMissing()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->type('Event in Laravel', 'title')
    //          ->press('Upload Video')
    //          ->see('The category field is required.')
    //          ->see('The url field is required.');
    // }

    // public function testThatVideoWasUpdated()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id' => $user->id,
    //         'name'    => 'Laravel',
    //         'icon'    => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboard/video/edit/'.$video->id)
    //       ->select($category->id, 'category')
    //       ->type('L', 'title')
    //       ->type('It is the language of the Html', 'icon')
    //       ->type('https://www.youtube.com/watch?v=hKUwxXgz2RM', 'url')
    //       ->press('Update')
    //       ->seePageIs('/dashboard/video/view')
    //       ->see('L');
    // }
    
    public function testThatOnlyLoggedInUserCanUpdateVideo()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'icon' => 'L',
        ]);

        $video = $this->uploadVideo($user, $category);
        $this->visit('/dashboard/video/edit/'.$video->id)
          ->seePageIs('/login');
    }

    // public function testThatASingleVideoWasRetrived()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboard/video/edit/'.$video->id)
    //      ->see($video->title);
    // }

    // public function testThatASingleVideoWasNotRetrived()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboard/video/edit/17')
    //      ->seePageIs('/dashboar/video/Upload Video')
    //      ->see('Oops! unauthorized access to video!');
    // }

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

    // public function testchangeVideoStatus()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboard/video/delete/'.$video->id)
    //    ->see('Operation Successfully');
    // }

    // public function testThatOnlyLoggedInUserCanDeleteVideo()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $category = factory('Desire2Learn\Category')->Upload Video([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);
    //     $video = $this->uploadVideo($user, $category);
    //     $this->visit('/dashboard/video/delete/'.$video->id)
    //     ->seePageIs('/login');
    // }

    public function uploadVideo($user, $category)
    {
        $video = factory('Desire2Learn\Video')->create([
          'title'        => 'Laravel',
          'user_id'      => $user->id,
          'category_id'  => $category->id,
          'views'        => 0,
        ]);

        return $video;
    }

    // public function testThatUserDoesNotSupplyAValidYoutubeUrl()
    // {
    //     $user = factory('Desire2Learn\User')->create();
    //     $category = factory('Desire2Learn\Category')->create([
    //         'user_id'     => $user->id,
    //         'name'        => 'Laravel',
    //         'icon' => 'L',
    //     ]);

    //     $video = $this->uploadVideo($user, $category);
    //     $this->actingAs($user)->visit('/dashboar/video/create')
    //          ->select($category->id, 'category')
    //          ->type('Laravel file System/Cloud Storage', 'title')
    //          ->type('//http://goodheads.io/2016/03/16/dependency-injection-explained-plain-english/', 'url')
    //          ->type('File upload system in laravel', 'icon')
    //          ->press('Upload Video')
    //          ->see('The url format is invalid.');
    // }

    // public function testThatAUrlClickLinksToAVideo()
    // {
    //     $user = factory('Desire2Learn\User')->Upload Video();
    //     $video = factory('Desire2Learn\Video')->Upload Video();
    //     $this->visit('/')
    //     ->click('VIEW')
    //     ->seePageIs('/view/video/'.$video->id);
    // }
}