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
                $this->rowExists(auth()->user()->id, $videoId, true);
            } else {
                $this->rowExists(auth()->user()->id, $videoId, false);
            }
        }
    }

    private function rowExists($userId, $videoId, $isLike)
    {
        $exists = Like::where('user_id', $userId)->where('video_id', $videoId)->first();

        switch(true) {
            case !$exists && $isLike:
                $this->likeVideo($videoId, $userId);
            break;
            case ! $exists && ! $isLike:
                $this->unlikeVideo($videoId, $userId);
            break;
            case $exists && $isLike:
                $this->alreadyLiked($exists);
            break;
            case $exists && !$isLike:
                $this->removeLike($exists);
            break;
        }
    }

    private function alreadyLiked($exists)
    {
        if ($exists->like) {
            $this->removeLike($exists);
        } else {
            $this->toggleLike($exists);
        }
    }

    private function removeLike($like)
    {
        Like::find($like->id)->delete();
        return response()->json(['message' => 'like deleted'], 200);
    }

    private function toggleLike($like)
    {
        if ($like->like) {
            $like->like = 0;
            $like->save();
            return response()->json($like);
        } else {
            $like->like = 1;
            $like->save();

            return response()->json($like, 200);
        }
    }

    private function likeVideo($videoId, $userId)
    {
        $this->like->video_id = $videoId;
        $this->like->user_id = $userId;
        $this->like->like = 1;
        $this->like->save();

        return response()->json($this->like, 200);
    }

    private function unlikeVideo($videoId, $userId)
    {
        $this->like->like = 0;
        $this->like->user_id = $userId;
        $this->like->video_id = $videoId;
        $this->like->save();

        return response()->json($this->like, 200);
    }

}