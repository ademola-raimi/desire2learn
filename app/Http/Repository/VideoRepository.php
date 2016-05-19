<?php

namespace desire2learn\Http\Repository;

use desire2learn\Video;
use desire2learn\User;

class VideoRepository
{

    /**
     * Return all user from the database
     */
    public function getAllVideos()
    {
        return Video::all();
    }

    public static function findVideo($id)
    {
        return Video::find($id);
    }

}