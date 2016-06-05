<?php

namespace Desire2Learn;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'last_name', 'first_name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Get the avatar from gravatar.
     *
     * @return string
     */
    private function getAvatarFromGravatar()
    {
        return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=500';
    }

    /**
     * Get avatar from the model.
     *
     * @return string
     */
    public function getAvatar()
    {
        if (!is_null($this->avatar)) { 
            return $this->avatar;
        } else {
            return $this->getAvatarFromGravatar();
        }
    }

    /**
     * Update user avatar
     *
     * return void
     */
    public function updateAvatar($url)
    {
        $this->avatar = $url;
        $this->save();
    }

    /**
     * A user has many videos
     *
     * @return object
     */
    public function videos()
    {
        return $this->hasMany('Desire2Learn\Video');
    }

    /**
     * A user has many categories
     *
     * @return object
     */
    public function categories()
    {
        return $this->hasMany('Desire2Learn\Category');
    }

    /**
     * Define roles table relationship
     *
     * @return object
     */
    public function role()
    {
        return $this->belongsTo('Desire2Learn\Role');
    }

    /**
     * Define likes table relationship
     *
     * @return object
     */
     public function likes()
    {
        return $this->hasMany('Desire2Learn\Like');
    }

    /**
     * Define likes table relationship
     *
     * @return object
     */
     public function views()
    {
        return $this->hasMany('Desire2Learn\View');
    }

    /**
     * Define comment table relationship
     *
     * @return object
     */
     public function comments()
    {
        return $this->hasMany('Desire2Learn\Comment');
    }
}
