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
        $isLike  = $request['isLike'] === 'true';
        $update  = false;
        $video   = Video::find($videoId);

        if (!$video) {
            return 'Something went wrong';
        }

        return $this->updateLikeTable($videoId, $isLike, $update, $video);
    }

    public function updateLikeTable($videoId, $isLike, $update, $video)
    {
        $user = Auth::user();
        $like = $user->likes()->where('video_id', $videoId)->first();
        if ($like) {
            $alreadyLike = $like->like;
            $update      = true;

            if ($alreadyLike == $isLike) {
                $like->delete();
            }
        } else {
            $like = new Like();
        }

        $this->wrapUpUpdate($videoId, $isLike, $update, $video, $like, $user);
    }

    public function wrapUpUpdate($videoId, $isLike, $update, $video, $like, $user)
    {
        $like->like    = $isLike;
        $like->user_id = $user->id;
        $like->video_id = $video->id;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return $this->sendResponseToJquery($like);
    }

    public function sendResponseToJquery($like)
    {
        return ['message' => 'Yoo'];
        
        if (is_null($like)) {
            return $response = json_encode([
                'message' => 'you did not show any reaction', 'status_code' => 400 
            ]);
        }

        if ($like->like == 1) {
            return $response = [
                'message' => 'You like this post', 'status_code' => 200 
            ];
        }
        return $response = [
                'message' => 'You dislike this post', 'status_code' => 200 
            ];
    }
}