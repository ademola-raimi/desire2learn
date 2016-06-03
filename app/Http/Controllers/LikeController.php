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
    private $like;
    public function __construct(Like $like)
    {
        $this->like = $like;
    }
	public function postLikeVideo(Request $request, $videoId)
    {
        if ($request->ajax()) {
            if ($request->get('isLike') === 'true') {
                return $this->checkRowExists(auth()->user()->id, $videoId, true);
            } else {
                return $this->checkRowExists(auth()->user()->id, $videoId, false);
            }
        }
    }

    private function checkRowExists($userId, $videoId, $isLike)
    {
        $exists = Like::where('user_id', $userId)->where('video_id', $videoId)->first();

        switch(true) {
            case ! $exists && $isLike:
               return $this->likeVideo($videoId, $userId);
            break;
            case ! $exists && ! $isLike:
                return $this->unlikeVideo($videoId, $userId);
            break;
            case $exists && $isLike:
                return $this->alreadyLiked($exists);
            break;
            case $exists && !$isLike:
                return $this->alreadyUnliked($exists);
            break;
        }
    }

    private function alreadyUnliked($exists)
    {
        if ($exists->like) {
            return $this->toggleLike($exists);
        } else {
            return $this->removeLike($exists);
        }
    }

    private function alreadyLiked($exists)
    {
        if ($exists->like) {
            return $this->removeLike($exists);
        } else {
            return $this->toggleLike($exists);
        }
    }

    private function removeLike($like)
    {
        Like::find($like->id)->delete();

        return response()->json(['message' => 'delete like row', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
    }

    private function toggleLike($like)
    {
        if ($like->like) {
            $like->like = 0;
            $like->save();
            
            return response()->json(['message' => 'update like column to 0 to unlike', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
        } else {
            $like->like = 1;
            $like->save();

            return response()->json(['message' => 'update like column to 1', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
        }
    }

    private function likeVideo($videoId, $userId)
    {
        $this->like->video_id = $videoId;
        $this->like->user_id = $userId;
        $this->like->like = 1;
        $this->like->save();

        return response()->json(['message' => 'create new row for like', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
    }

    private function unlikeVideo($videoId, $userId)
    {
        $this->like->like = 0;
        $this->like->user_id = $userId;
        $this->like->video_id = $videoId;
        $this->like->save();

        return response()->json(['message' => 'create new row for unlike', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
    }

    public function countLike()
    {
        $like = Like::where('like', 1)->get();

        return $like->count();
    }

    public function countUnLike()
    {
        $like = Like::where('like', 0)->get();

        return $like->count();
    }
}