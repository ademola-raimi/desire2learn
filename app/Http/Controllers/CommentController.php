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
     * This method processes comment creation and returns reponse to jquery
     *
     * @return Response
     */
    public function postComment(Request $request)
    {
        $newComment = Comment::create([
            'comment' => $request['comment'],
            'user_id' => Auth::user()->id,
            'video_id'=> $request['video_id'],
        ]);

        return $response = [
            'message'     => 'Comment created Successfully',
            'status_code' => 200,
            'commentId'   => $newComment->id,
        ];
    }
}
