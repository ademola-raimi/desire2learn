<?php

namespace Desire2Learn;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'user_id',
    ];

    /**
     * A Category belongs to many videos
     *
     * @return Object.
     */
    public function video()
    {
        return $this->belongsTo('Desire2Learn\Video');
    }

    /**
     * A category belongs to one user.
     *
     * @return Object
     */
    public function user()
    {
        return $this->belongsTo('Desire2Learn\User');
    }
}
