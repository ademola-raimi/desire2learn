<?php

namespace Desire2Learn\Http\Controllers;

use Desire2Learn\Like;
use Desire2Learn\Video;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;

class LikeController extends Controller
{
	public function postLikePost(Request $request)
    {
        $video_id = $request['VideoId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($video_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('video_id', $video_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->video_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}