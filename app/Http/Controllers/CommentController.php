<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Alert;
use Desire2Learn\Comment;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Desire2Learn\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Process comment creation
     */
    public function postComment(Request $request)
    {
        $comment = Comment::create([
            'comments'    => $request['comment'],
            'user_id'     => Auth::user()->id,
            'video_id'    => $request['video_id'],
        ]);

        return $response = [
            'message' => 'Comment created Successfully',
            'status_code' => 200,
            'commentId' => $newComment->id,
        ];

    }

    /**
     * Get 10 comments from current video
     */
    public function fetchComment(Request $request)
    {
        $totalComments = $request->input('offset');
        $videoId       = $request->input('video_id');

        $oldComments = Comment::where('video_id', $videoId)
            ->skip($totalComments)
            ->take(10)
            ->get();
        if ($oldComments) {
	        return $response =[
	            'message' => 'Comment retrieved Successfully',
	            'status_code' => 200,
	            'comments' => $oldComments
	        ];
	    } else {
	    	return $response = [
	    		'message'     => 'something went wrong',
	    		'status_code' => 404
	    	];
	    }    
    }

    /**
     * deleteComment Delete a comment that belongs to the logged in user
     * 
     * @param  $commentId
     * @return  
     */
    public function deleteComment(Request $request, $commentId)
    {
        $request->session()->flash('show_comments', true);

        $deleteComment = Comment::where('id', $commentId)
        ->where('user_id', Auth::user()->id)
        ->delete();
        if ($deleteComment) {
        	return $deleteComment;
    	} else {
    		alert()->error('Something went wrong', 'Error');
    	}
    }

    /**
     * editComment, Allow an authenticated user to update the contents of a comment.
     *
     * @param  $id
     *
     * @return boolean
     * 
     */
    public function editComment(Request $request, $id)
    {
        $request->session()->flash('show_comments', true);

        $updateComment = Comment::where('id', $id)
        	->where('user_id', Auth::user()->id)
        	->update([
                'comments' => $request->input('comment')
            ]);
        if ($updateComment) {
        	return $updateComment;
        } else {
        	alert()->error('Something went wrong', 'Error');
        }
    }
}
