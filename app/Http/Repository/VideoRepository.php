<?php

namespace desire2learn\Http\Repository;

use desire2learn\User;

class VideoRepository
{

    /**
     * Return all user from the database
     */
    public function getAllUsers()
    {
        return User::all();
    }

    public static function findUser($id)
    {
        return User::find($id);
    }

}