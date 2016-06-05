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

    /**
     * Like is injected in order to initialize the model
     * 
     */
    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    /**
     * This method gets the response from jquery and call the the 
     * method that will check if row exit in the Like table.
     * 
     * @param $videoId
     * @param $request
     */
	public function postLikeVideo($videoId, Request $request)
    {
        if ($request->ajax()) {
            if ($request->get('isLike') === 'true') {
                return $this->checkRowExists(auth()->user()->id, $videoId, true);
            } else {
                return $this->checkRowExists(auth()->user()->id, $videoId, false);
            }
        }
    }

    /**
     * This method check the Like table with various cases
     * 
     * @param $videoId
     * @param $request
     * @param $IsLike
     */
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
                return $this->alreadyLiked($exists, $videoId);
            break;
            case $exists && !$isLike:
                return $this->alreadyUnliked($exists, $videoId);
            break;
        }
    }

    /**
     * This method treat the case of row exist and isLike is false.
     * it then update or delete base on the available like column data
     * 
     * @param $exists
     */
    private function alreadyUnliked($exists, $videoId)
    {
        if ($exists->like) {
            return $this->toggleLike($exists, $videoId);
        } else {
            return $this->removeLike($exists, $videoId);
        }
    }

    /**
     * This method treat the case of row exist and isLike is true.
     * It then update or delete base on the available like column data
     * 
     * @param $exists
     */
    private function alreadyLiked($exists, $videoId)
    {
        if ($exists->like) {
            return $this->removeLike($exists, $videoId);
        } else {
            return $this->toggleLike($exists, $videoId);
        }
    }

    /**
     * This method remove the entire row
     * 
     * @param $like
     * 
     * @return Json response
     */
    private function removeLike($like, $videoId)
    {
        Like::find($like->id)->delete();

        return response()->json(['message' => 'delete like row', 'like' => $this->countLike($videoId), 'unlike' => $this->countUnLike($videoId)], 200);
    }

    /**
     * This method update the like column
     * 
     * @param $like
     * 
     * @return Json response
     */
    private function toggleLike($like, $videoId)
    {
        if ($like->like) {
            $like->like = false;
            $like->save();
            
            return response()->json(['message' => 'update like column to 0', 'like' => $this->countLike($videoId), 'unlike' => $this->countUnLike($videoId)], 200);
        } else {
            $like->like = true;
            $like->save();

            return response()->json(['message' => 'update like column to 1', 'like' => $this->countLike($videoId), 'unlike' => $this->countUnLike($videoId)], 200);
        }
    }

    /**
     * This method treat the case of row doesn't exist and isLike is true.
     * it then creates the row and set like column to 1
     * 
     * @param $videoId
     * @param $userId
     * 
     * @return Json response
     */
    private function likeVideo($videoId, $userId)
    {
        $this->like->video_id = $videoId;
        $this->like->user_id = $userId;
        $this->like->like = true;
        $this->like->save();

        return response()->json(['message' => 'create new row for like', 'like' => $this->countLike($videoId), 'unlike' => $this->countUnLike($videoId)], 200);
    }

    /**
     * This method treat the case of row doesn't exist ans isLike is false.
     * It then creates the row and set the like column to 0
     * 
     * @param $videoId
     * @param $userId
     * 
     * @return Json response
     */
    private function unlikeVideo($videoId, $userId)
    {
        $this->like->like = false;
        $this->like->user_id = $userId;
        $this->like->video_id = $videoId;
        $this->like->save();

        return response()->json(['message' => 'create new row for unlike', 'like' => $this->countLike($videoId), 'unlike' => $this->countUnLike($videoId)], 200);
    }

    /**
     * This method count the number of like in the Like table
     *
     * 
     * @return integer
     */
    private function countLike($videoId)
    {
        $video = Video::find($videoId);
        $like = $video->likes->where('like', true);

        return $like->count();
    }

    /**
     * This method count the number of unlike in the Like table.
     * 
     * @return integer
     * 
     */
    private function countUnLike($videoId)
    {
        $video = Video::find($videoId);
        $like = $video->likes->where('like', false);

        return $like->count();
    }
}
