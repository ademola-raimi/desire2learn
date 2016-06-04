<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
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
