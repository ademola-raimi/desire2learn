<?php

namespace desire2learn\Http\Repository;

use desire2learn\User;
use Auth;

class UserRepository
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

    public function findUserWhere($username)
    {
        return User::where('username', '=', $username)
        ->first([
            'id',
            'username',
            'email',
            'created_at',
            'updated_at',
            'avatar'
        ]);
    }
}
