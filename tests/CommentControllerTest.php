<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommentControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testThatCommentWasAddedSuccessfully()
    {
        // $user = factory('Desire2Learn\User')->create();
        // $video = factory('Desire2Learn\Video')->create();
        // $request = $this->actingAs($user)
        // ->call('POST', '/comment', [
        //     'comment' => 'This is a comment body',
        //     'user'    => $user->id,
        //     'video'   => $video->id,
        // ]);

        // $response = json_decode($request->getContent());
        // dd($response);
        // $this->assertEquals($response->message, 'Comment created successfully!');
        // $this->assertEquals($response->statuscode, 201);
    }
}