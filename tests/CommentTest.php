<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test guest user cannot comment
     */
    public function testGuestUserCannotComment()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->visit('/video/1')
             ->see('Only logged in users can comment.');
    }

    /**
     * assert that an authenitcated user can add a new comment to a
     * video.
     *
     * @return void
     */
    public function testAddNewComment()
    {
        $user     = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $this->actingAs($user)
            ->call(
                'POST',
                '/comment',
                [
                    'comment' => 'Swanky new comment',
                    'video_id'=> $video['id']
                ]
            );
        $this->seeInDatabase('comments', ['comment' => 'Swanky new comment']);
        $this->seeInDatabase('comments', ['video_id' => $video['id']]);
        $this->seeInDatabase('comments', ['user_id' => $video['id']]);
    }

    /* Assert that a HTTP GET request for fetch comment to the
     *
     * URL /comment with offset amd video id  will fetch the comments on
     * a video
     *
     * @return boolean true
     */
    public function testFetchComment()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $comment = factory('Desire2Learn\Comment')->create();

        $this->actingAs($user)->visit('/video/1')
            ->see($comment->comment);
    }

    /**
     * test that a Comment belongs to a video.
     *
     * @return void
     */
    public function testCommentVideoRelationship()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $comment = factory('Desire2Learn\Comment')->create();

        $this->assertEquals($comment->video_id, $comment->video->id);
    }
    
    /**
     * test the that a comment belongs to a user.
     *
     * @return void
     */
    public function testCommentUserRelationship()
    {
        $user = factory('Desire2Learn\User')->create();
        $category = factory('Desire2Learn\Category')->create([
            'user_id'     => $user->id,
            'name'        => 'Laravel',
            'description' => 'framework of the artisan',
        ]);

        $video = $this->uploadVideo($user, $category);

        $comment = factory('Desire2Learn\Comment')->create();

        $this->assertEquals($comment->user_id, $comment->user->id);
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
}