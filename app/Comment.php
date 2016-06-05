<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'video_id', 'comment'];

    public function video()
    {
        return $this->belongsTo('Desire2Learn\Video');
    }

    /**
     * Comments belong to a user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('Desire2Learn\User');
    }
}
