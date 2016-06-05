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
                return $this->alreadyLiked($exists);
            break;
            case $exists && !$isLike:
                return $this->alreadyUnliked($exists);
            break;
        }
    }

    /**
     * This method treat the case of row exist and isLike is false.
     * it then update or delete base on the available like column data
     * 
     * @param $exists
     */
    private function alreadyUnliked($exists)
    {
        if ($exists->like) {
            return $this->toggleLike($exists);
        } else {
            return $this->removeLike($exists);
        }
    }

    /**
     * This method treat the case of row exist and isLike is true.
     * It then update or delete base on the available like column data
     * 
     * @param $exists
     */
    private function alreadyLiked($exists)
    {
        if ($exists->like) {
            return $this->removeLike($exists);
        } else {
            return $this->toggleLike($exists);
        }
    }

    /**
     * This method remove the entire row
     * 
     * @param $like
     * 
     * @return Json response
     */
    private function removeLike($like)
    {
        Like::find($like->id)->delete();

        return response()->json(['message' => 'delete like row', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
    }

    /**
     * This method update the like column
     * 
     * @param $like
     * 
     * @return Json response
     */
    private function toggleLike($like)
    {
        if ($like->like) {
            $like->like = false;
            $like->save();
            
            return response()->json(['message' => 'update like column to 0', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
        } else {
            $like->like = true;
            $like->save();

            return response()->json(['message' => 'update like column to 1', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
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

        return response()->json(['message' => 'create new row for like', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
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

        return response()->json(['message' => 'create new row for unlike', 'like' => $this->countLike(), 'unlike' => $this->countUnLike()], 200);
    }

    /**
     * This method count the number of like in the Like table
     *
     * 
     * @return integer
     */
    private function countLike()
    {
        $like = Like::where('like', true)->get();

        return $like->count();
    }

    /**
     * This method count the number of unlike in the Like table.
     * 
     * @return integer
     * 
     */
    private function countUnLike()
    {
        $like = Like::where('like', false)->get();

        return $like->count();
    }
}
