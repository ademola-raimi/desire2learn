<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideoReactionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test that user can like a video
     */
    public function testThatUserLikeAVideo()
    {
        $user     = factory('Desire2Learn\User')->create();
        $video    = factory('Desire2Learn\Video')->create();
        $response = $this->actingAs($user)
            ->call('POST', 'video/'.$video->id. '/like', [
            'user' => $user->id,
        ]);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
