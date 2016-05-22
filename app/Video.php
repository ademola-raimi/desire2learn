<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable  =[
        'title',
        'url',
        'category',
        'description',
        'user_id',
    ];
    /**
     * A video belongs to one user.
     *
     * @return Object
     */
    public function user()
    {
        return $this->belongsTo('Desire2Learn\User');
    }

    /**
     * A video belongs to many categories
     *
     * @return Object.
     */
    public function categories()
    {
        return $this->belongsToMany('Desire2Learn\Category')->withTimestamps();
    }

    /**
     * Each episode has many likes
     *
     * @return object
     */
    public function likes()
    {
        return $this->hasMany('Desire2Learn\Like');
    }

}
