<?php

namespace Desire2Learn\Http\Controllers;

use Auth;
use Desire2Learn\Like;
use Desire2Learn\Video;
use Illuminate\Http\Request;
use Desire2Learn\Http\Requests;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
	public function postLikeVideo(Request $request, $video_id)
    {
        $videoId = $video_id;
        $isLike = $request['isLike'] === 'true';
        $update = false;
        $video = Video::find($videoId);

        if (!$video) {
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()->where('video_id', $videoId)->first();

        if ($like) {
            $alreadyLike = $like->like;
            $update = true;

            if ($alreadyLike == $isLike) {
                $like->delete();

                return null;
            }
        } else {
            $like = new Like();
        }

        $like->like = $isLike;
        $like->user_id = $user->id;
        $like->video_id = $video->id;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return null;
    }
}