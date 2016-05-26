<?php

namespace Desire2Learn\Events;

use Video;
use Illuminate\Session\Store;

class ViewVideoHandler
{
	private $session;

    public function __construct(Store $session)
    {
        // Let Laravel inject the session Store instance,
        // and assign it to our $session variable.
        $this->session = $session;
    }

    public function handle(Post $post)
	{
	    if ( ! $this->isPostViewed($post))
	    {
	        $post->increment('view_counter');
	        $post->view_counter += 1;

	        $this->storePost($post);
	    }
	}

	private function isPostViewed($post)
	{
	    // Get all the viewed posts from the session. If no
	    // entry in the session exists, default to an
	    // empty array.
	    $viewed = $this->session->get('viewed_posts', []);

	    // Check the viewed posts array for the existance
	    // of the id of the post
	    return in_array($post->id, $viewed);
	}

	private function storePost($post)
	{    
	    // Push the post id onto the viewed_posts session array.
	    $this->session->push('viewed_posts', $post->id);
	}
}