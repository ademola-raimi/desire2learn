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

    public function video()
    {
        return $this->belongsTo('Desire2Learn\Video');
    }

    public function user()
    {
        return $this->belongsTo('Desire2Learn\User');
    }
}
