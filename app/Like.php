<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'likes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'video_id'];

    /**
     * Likes belong to a video
     *
     * @return object
     */
    public function video()
    {
        return $this->belongsTo('Desire2Learn\Video');
    }

    /**
     * Like belong to a user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('Desire2Learn\User');
    }
}
